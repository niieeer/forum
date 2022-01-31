<?php

namespace App\Controller;

use App\Entity\Article;
use Exception;
use Router\Router;
use App\Models\AbstractRepository;
use App\Helpers\EntityManagerHelper as Em;
use Doctrine\ORM\Mapping\ClassMetadata;
use \DateTime;

class ArticleController
{

    public function showForm()
    {

        include './src/Views/ajoutArticle.php';
    }

    public function addArticle()
    {
        if (isset($_POST['title'], $_POST['resume'], $_POST['author'], $_POST['editor'])) {
            $post = array_map('trim', array_map('strip_tags', $_POST));
        } else
            throw new Exception("Error when retrieving Article fields", 1);
        $entityManager = Em::getEntityManager();
        $article = new Article($post['title'], $post['resume'], $post['author'], $post['editor']);
        $entityManager->persist($article);

        try {
            $entityManager->flush();
            echo "Your article is well registered!";
            header('Refresh: 3; URL=http://localhost/TP');
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function showArticle()
    {
        $entityManager = Em::getEntityManager();
        $class = new ClassMetadata("App\Entity\Article");
        $articleRepository = new AbstractRepository($entityManager, $class);
        $articles = $articleRepository->findAll();
        include './src/Views/indexArticle.php';
    }



    public function modifyArticle($id)
    {
        $entityManager = Em::getEntityManager();
        $class = new ClassMetadata("App\Entity\Article");
        $articleRepository = new AbstractRepository($entityManager, $class);
        try {
            $articles = $articleRepository->find($id);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        include './src/Views/modifyArticle.php';
    }

    public function sendModifyArticle($id)
    {
        if (isset($_POST['title'], $_POST['resume'], $_POST['author'], $_POST['editor'])) {
            $post = array_map('trim', array_map('strip_tags', $_POST));
            echo "C'est bon man ton article est modifier !";
        } else
            throw new Exception("Error when retrieving Article fields", 1);

        $entityManager = Em::getEntityManager();
        $class = new ClassMetadata("App\Entity\Article");
        $articleRepository = new AbstractRepository($entityManager, $class);
        $article = $articleRepository->find($id);

        $article->setTitle($post['title']);
        $article->setResume($post['resume']);
        $article->setAuthor($post['author']);
        $article->setEditor($post['editor']);

        $entityManager->persist($article);
        try {
            $entityManager->flush();
            echo "Your article is well modified!";
            header('Refresh: 3; URL=http://localhost/TP');
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function deleteArticle($id)
    {
        $entityManager = Em::getEntityManager();
        $class = new ClassMetadata("App\Entity\Article");
        $articleRepository = new AbstractRepository($entityManager, $class);
        $article = $articleRepository->find($id);
        $entityManager->remove($article);
        try {
            $entityManager->flush();
            echo "Your article is well deleted!";
            header('Refresh: 3; URL=http://localhost/TP');
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
