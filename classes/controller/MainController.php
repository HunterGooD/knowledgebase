<?php
/**
 * Файл чисто для тестов не использовать как реальный
 */

namespace contrller;

$start = microtime(true);
ini_set("error_reporting", E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

require_once '../__autoload.php';

class MainController {

    /**
     *
     * @var \subscription\Subscriptions
     */
    private $subscriptions;

    /**
     *
     * @var \observer\ElementObserver
     */
    private $observer;

    /**
     *
     * @var \elements\Catalog
     */
    private $catalog;

    /**
     * Создает $this->subscriptions по классу \subscription\Subscriptions
     */
    public function createSubscriptions() {
        $this->subscriptions = new \subscription\Subscriptions();
    }

    /**
     * Создает $this->observer по классу \observer\ElementObserver
     */
    public function createObserver() {
        $this->observer = new \observer\ObserverImpl();
        if (!empty($this->subscriptions)) {
            $this->observer->setSubscriptions($this->subscriptions);
        }
    }

    /**
     * Создает $this->catalog по классу \elements\Catalog
     */
    public function createCatalog() {
        $this->catalog = new \catalog\Catalog("../../index.html");
        $this->catalog->createDocuments();
    }
    
    /**
     * Тестовый метод для проверки генерируется ли структура документов и ресурсов
     * 
     */
    public function createStructur() {
        $this->createSubscriptions();
        $this->createObserver();
        $docs = $this->catalog->getDocuments();
        foreach ($docs as $doc) {
            //var_dump($doc);
            //echo "-------------------------------------------------------------------------------------------------------------------\r\n";
            $doc->createResources();
            //var_dump($doc->getResources());
            //echo "+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++\r\n";
            
            //Добавляет наблюдателя всем
            $doc->setObserver($this->observer);
            foreach ($doc->getResources() as $resource) {
                $resource->setObserver($this->observer);
            }
            
        }
    }

    /**
     * Поиск документа по ключевому слову
     */
    public function searchDocument($word) {
        echo "++++++++++++++SEARCH------------------------\r\n";
        $word = "precedent";
        var_dump($this->catalog->searchByKeyword($word));
        echo "+++++++++++++SEARCH------------------------ \r\n";
        $docs = $this->catalog->getDocuments();
        $word = "kratkoe_opisanie_proekta";
        var_dump($this->catalog->searchByKeyword($word));
    }
    
    
    public function viewSubscription($user) {
        /**
         * массив не прочитанных подписок 
         * Обработать для предоставления пользователю чтобы смог читать
         * 
         * Добавить еще один метод которы даже прочитанные тоже будет выдавать
         * а тут только для обязательного ознакомления 
         */
        $material = $this->subscriptions->getSubscriptionByUser($user);
        
    }

}

$mc = new MainController();

$mc->createCatalog();
$mc->createStructur();

$mc->searchDocument("");

echo "\r\n\r\n";
echo microtime(true) - $start . " sec. \r\n\r\n"; 
