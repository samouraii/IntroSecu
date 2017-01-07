<?php
namespace Manu\TfeBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Persistence\ObjectManager;
use Manu\TfeBundle\Entity\User;

class UserToIdTransformer implements DataTransformerInterface
{
    /**
     * @var ObjectManager
     */
    private $om;

    /**
     * @param ObjectManager $om
     */
    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }

    /**
     * Transforms an object (user) to a string (id).
     *
     * @param  User|null $user
     * @return string
     */
    public function transform($user)
    {
        if (null === $user) {
            return "";
        }

        return $user->getId();
    }

    /**
     * Transforms a string (id) to an object (user).
     *
     * @param  string $id
     * @return User|null
     * @throws TransformationFailedException if object (user) is not found.
     */
    public function reverseTransform($id)
    {
        if (!$id) {
            return null;
        }

        $user = $this->om
            ->getRepository('ManuTfeBundle:User')
            ->findOneBy(array('id' => $id))
        ;

        if (null === $user) {
            throw new TransformationFailedException(sprintf(
                'Le problème avec l\'id "%s" ne peut pas être trouvé!',
                $id
            ));
        }

        return $user;
    }
}
