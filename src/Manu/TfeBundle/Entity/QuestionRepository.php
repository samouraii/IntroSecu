<?php

namespace Manu\TfeBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Manu\TfeBundle\Entity\Question;

/**
 * QuestionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class QuestionRepository extends EntityRepository
{

    /**
     * find Questions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuestionsByCategorieAndNiveau($data)
    {
        if (!$data['categorie'] or !$data['niveau'])
        {
            return [];
        }
        $categorie = $this
            ->getEntityManager()
            ->getRepository('Manu\TfeBundle\Entity\Categorie')
            ->find($data['categorie']);
        $niveau = $this
            ->getEntityManager()
            ->getRepository('Manu\TfeBundle\Entity\Niveau')
            ->find($data['niveau']);
        if ($categorie->getCustom())
        {
            return $this->getCustomQuestion($categorie, $niveau);
        }
        $query = $this->createQueryBuilder('a');
        $query->where('a.categorie = :categorie')
            ->andWhere('a.niveau = :niveau')
            ->setParameters(array(
                'categorie' => $data['categorie'],
                'niveau' => $data['niveau']));
        return $query->getQuery()->getResult();
    }

    private function getCustomQuestion($categorie, $niveau)
    {
        $question = new Question();
        $question->setCategorie($categorie);
        $question->setNiveau($niveau);
        switch($categorie->getNom())
        {
            case "OSPF":
                $this->setOSPFQuestion($question, $niveau);
                break;
            case "STP":
                $this->setSTPQuestion($question, $niveau);
                break;
        }
        return [$question];
    }

    private function setOSPFQuestion($question, $niveau)
    {
        $question->setTitre('Election DR dans un rÃ©seau OSPF');
        $question->setImage("ospf.jpeg");
        $question->setChoice(array("RA" => "RA",
                                   "RB" => "RB",
                                   "RC" => "RC"));
        switch($niveau->getNom())
        {
            case "Facile":
                $this->setOSPFFacileQuestion($question);
                break;
            case "Moyen":
                $this->setOSPFMoyenQuestion($question);
                break;
            case "Difficile":
                $this->setOSPFDifficileQuestion($question);
                break;
        }
    }

    private function setOSPFFacileQuestion($question)
    {
        $customquestion = "Quel sera le DR sur ce schÃ©ma ?";
        $list = $this->generateRandomPriority(3);
        $p1 = $list[0];
        $p2 = $list[1];
        $p3 = $list[2];
        $bestp = max($p1, $p2, $p3);
        $customquestion = $customquestion."\nRA: ".$p1."\nRB: ".$p2."\nRC: ".$p3;
        $customreponse = "";
        switch($bestp)
        {
            case $p1:
                $customreponse = "RA";
                break;
            case $p2:
                $customreponse = "RB";
                break;
            case $p3:
                $customreponse = "RC";
                break;
        }
        $question->setQuestion($customquestion);
        $question->setReponse($customreponse);
    }

    private function setOSPFMoyenQuestion($question)
    {
        $customquestion = "Quel sera le DR sur ce schÃ©ma ?";
        $list = $this->generateRandomPriority(2);
        $p1 = $list[0];
        $p2 = $list[1];
        $bestp = max($list);
        $list[2] = $bestp;
        $p3 = $list[2];
        $listip = $this->generateRandomIp(3);
        $ip1 = $listip[0];
        $ip2 = $listip[1];
        $ip3 = $listip[2];
        $listbestip;
        foreach($list as $key => $value)
        {
            if ($value == $bestp)
            {
                $listbestip[$key] = $listip[$key];
            }
        }
        $bestip = max($listbestip);

        $customquestion = $customquestion."\nRA: prioritÃ©: ".$p1."\tip: 192.168.1.".$ip1."/24";
        $customquestion = $customquestion."\nRB: prioritÃ©: ".$p2."\tip: 192.168.1.".$ip2."/24";
        $customquestion = $customquestion."\nRC: prioritÃ©: ".$p3."\tip: 192.168.1.".$ip3."/24";
        $customreponse = "";
        switch($bestip)
        {
            case $ip1:
                $customreponse = "RA";
                break;
            case $ip2:
                $customreponse = "RB";
                break;
            case $ip3:
                $customreponse = "RC";
                break;
        }
        $question->setQuestion($customquestion);
        $question->setReponse($customreponse);
    }

    private function setOSPFDifficileQuestion($question)
    {
        $customquestion = "Quel sera le DR sur ce schÃ©ma ?";
        $list = $this->generateRandomPriority(2);
        $p1 = $list[0];
        $p2 = $list[1];
        $bestp = max($list);
        $list[2] = $bestp;
        $p3 = $list[2];
        $listip = $this->generateRandomIp(3);
        $ip1 = $listip[0];
        $ip2 = $listip[1];
        $ip3 = $listip[2];
        $listlb = $this->generateRandomIp(3);
        $lb1 = $listlb[0];
        $lb2 = $listlb[1];
        $lb3 = $listlb[2];
        $bestlb = max($listlb);

        $listbestip;
        foreach($list as $key => $value)
        {
            if ($value == $bestp)
            {
                $listbestlb[$key] = $listlb[$key];
            }
        }
        $bestlb = max($listbestlb);

        $customquestion = $customquestion."\nRA: prioritÃ©: ".$p1."\tip: 192.168.1.".$ip1."/24"."\tloopback: ".$lb1.".1.1.1/30";
        $customquestion = $customquestion."\nRB: prioritÃ©: ".$p2."\tip: 192.168.1.".$ip2."/24"."\tloopback: ".$lb2.".1.1.1/30";
        $customquestion = $customquestion."\nRC: prioritÃ©: ".$p3."\tip: 192.168.1.".$ip3."/24"."\tloopback: ".$lb3.".1.1.1/30";
        $customreponse = "";
        switch($bestlb)
        {
            case $lb1:
                $customreponse = "RA";
                break;
            case $lb2:
                $customreponse = "RB";
                break;
            case $lb3:
                $customreponse = "RC";
                break;
        }
        $question->setQuestion($customquestion);
        $question->setReponse($customreponse);
    }

    private function generateRandomIp($quantity)
    {
        $numbers = range(1, 254);
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);
    }

    private function generateRandomPriority($quantity)
    {
        $numbers = range(0, 255);
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);
    }

    private function setSTPQuestion($question, $niveau)
    {
        $question->setTitre('Election du port bloquÃ© dans un rÃ©seau STP');
        $question->setImage("stp.jpeg");
        $question->setChoice(array("Fa1/1" => "Fa1/1",
                                   "Fa1/2" => "Fa1/2",
                                   "Fa2/1" => "Fa2/1",
                                   "Fa2/2" => "Fa2/2",
                                   "Fa3/1" => "Fa3/1",
                                   "Fa3/2" => "Fa3/2"));
        switch($niveau->getNom())
        {
            case "Facile":
                $this->setSTPFacileQuestion($question);
                break;
            case "Moyen":
                $this->setSTPMoyenQuestion($question);
                break;
            case "Difficile":
                $this->setSTPDifficileQuestion($question);
                break;
        }
    }

    private function setSTPFacileQuestion($question)
    {
        $customquestion = "Quel sera le port bloquÃ© sur ce schÃ©ma ?";
        $list = $this->generateRandomStpPriority(3);
        $p1 = $list[0];
        $p2 = $list[1];
        $p3 = $list[2];
        $mlist = $this->generateRandomMac(3);
        $m1 = $mlist[0];
        $m2 = $mlist[1];
        $m3 = $mlist[2];
        $bestp = min($p1, $p2, $p3);
        $customquestion = $customquestion."\nSW1: prioritÃ© STP: ".$p1."\t MAC: aaaa:bbbb:cc".$m1."\nSW2: prioritÃ© STP: ".$p2."\t MAC: aaaa:bbbb:cc".$m2."\nSW3: prioritÃ© STP: ".$p3."\t MAC: aaaa:bbbb:cc".$m3;
        $customreponse = "";
        switch($bestp)
        {
            case $p1:
                $customreponse = "Fa3/2";
                if ($p2 > $p3)
                {
                    $customreponse = "Fa2/2";
                }
                break;
            case $p2:
                $customreponse = "Fa3/1";
                if ($p1 > $p3)
                {
                    $customreponse = "Fa1/2";
                }
                break;
            case $p3:
                $customreponse = "Fa2/1";
                if ($p1 > $p2)
                {
                    $customreponse = "Fa1/1";
                }
                break;
        }
        $question->setQuestion($customquestion);
        $question->setReponse($customreponse);
    }

    private function setSTPMoyenQuestion($question)
    {
        $customquestion = "Quel sera le port bloquÃ© sur ce schÃ©ma ?";
        $list = $this->generateRandomStpPriority(2);
        $p1 = $list[0];
        $p2 = $list[1];
        $p3 = min($list);
        $list[2] = $p3;
        $mlist = $this->generateRandomMac(3);
        $m1 = $mlist[0];
        $m2 = $mlist[1];
        $m3 = $mlist[2];
        $bestp = min($p1, $p2, $p3);


        $listbestmac;
        foreach($list as $key => $value)
        {
            if ($value == $bestp)
            {
                $listbestmac[$key] = $mlist[$key];
            }
        }
        $bestmac = min($listbestmac);
        $customquestion = $customquestion."\nSW1: prioritÃ© STP: ".$p1."\t MAC: aaaa:bbbb:cc".$m1."\nSW2: prioritÃ© STP: ".$p2."\t MAC: aaaa:bbbb:cc".$m2."\nSW3: prioritÃ© STP: ".$p3."\t MAC: aaaa:bbbb:cc".$m3;
        $customreponse = "";
        switch($bestmac)
        {
            case $m1:
                $customreponse = "Fa3/2";
                if ($p2 > $p3)
                {
                    $customreponse = "Fa2/2";
                }
                break;
            case $m2:
                $customreponse = "Fa3/1";
                if ($p1 > $p3)
                {
                    $customreponse = "Fa1/2";
                }
                break;
            case $m3:
                $customreponse = "Fa2/1";
                if ($p1 > $p2)
                {
                    $customreponse = "Fa1/1";
                }
                break;
        }
        $question->setQuestion($customquestion);
        $question->setReponse($customreponse);
    }

    private function setSTPDifficileQuestion($question)
    {
        return $this->setSTPFacileQuestion($question);
    }

    private function generateRandomStpPriority($quantity)
    {
        $numbers = array("24577", "4096", "28673", "32769");
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);
    }

    private function generateRandomMac($quantity)
    {
        $numbers = range(10, 99);
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);
    }
}