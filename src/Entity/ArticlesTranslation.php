<?php

namespace App\Entity;

use App\Repository\ArticlesTranslationRepository;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Contract\Entity\TranslationInterface;
use Knp\DoctrineBehaviors\Model\Translatable\TranslationTrait;

#[ORM\Entity(repositoryClass: ArticlesTranslationRepository::class)]
class ArticlesTranslation implements TranslationInterface
{
    use TranslationTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}

/*
intégration twig

/** @var \Knp\DoctrineBehaviors\Contract\Entity\TranslatableInterface $category */
/*$category = new Category();
$category->translate('fr')->setName('Chaussures');
$category->translate('en')->setName('Shoes');
$entityManager->persist($category);

// In order to persist new translations, call mergeNewTranslations method, before flush
$category->mergeNewTranslations();
//obtention de la traduction englaise du titre
$category->translate('en')->getName();

*/