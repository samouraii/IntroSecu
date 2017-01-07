<?php
namespace Manu\TfeBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Persistence\ObjectManager;
use Manu\TfeBundle\Entity\Question;

class QuestionToIdTransformer implements DataTransformerInterface
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
     * Transforms an object (question) to a string (id).
     *
     * @param  Question|null $question
     * @return string
     */
    public function transform($question)
    {
        if (null === $question) {
            return "";
        }

        return $question->getId();
    }

    /**
     * Transforms a string (id) to an object (question).
     *
     * @param  string $id
     * @return Question|null
     * @throws TransformationFailedException if object (question) is not found.
     */
    public function reverseTransform($id)
    {
        if (!$id) {
            return null;
        }

        $question = $this->om
            ->getRepository('ManuTfeBundle:Question')
            ->findOneBy(array('id' => $id))
        ;

        if (null === $question) {
            throw new TransformationFailedException(sprintf(
                'Le problème avec l\'id "%s" ne peut pas être trouvé!',
                $id
            ));
        }

        return $question;
    }
}
