<?php

namespace App\View\Components;

use App\Abstracts\Carousel;

class PressCarousel extends Carousel
{
    public string $id = 'press-carousel';

    public string $imagesFolderPath = 'images/press-logos';

    public bool $hasLinks = true;

    public bool $background = true;

    public bool $pauseOnHover = true;

    public array $links = [
        'digital_first.png' => 'https://www.digitalfirstmagazine.com/tailoor-revolutionizing-retail-with-ai-powered-personalization-and-sustainability/',
        'ecommerceguru.png' => 'https://www.ecommerceguru.it/tailoor-thun-e-commerce/',
        'fashion_united.png' => 'https://fashionunited.com/news/business/the-shirt-dandy-adds-new-ai-functions-in-collab-with-tailoor-by-successori-reda/2024041259376',
        'larepubblica.png' => 'https://roma.repubblica.it/dossier-adv/tailoor-spa/2024/11/01/news/tailoor_il_nuovo_alleato_nella_vendita_di_camicie_su_misura_online-423585212/',
        'mf.png' => 'https://video.milanofinanza.it/video/digitalizzazione-dei-processi-trasformare-i-dati-nascosti-in-asset-strategici-Ja5XX4iE380y',
        'lastampa.png' => 'https://www.lastampa.it/advertorial/torino/2024/11/04/news/tailoor_il_nuovo_alleato_nella_vendita_di_camicie_su_misura_online-14763598/',
        'pambianco.png' => 'https://www.pambianconews.com/2024/01/18/tailoor-ha-portato-innovazione-tecnologica-e-sostenibilita-ad-nfr-retails-big-show-2024-393539/',
        'wsi.png' => 'https://www.wallstreetitalia.com/video/micam-tailoor-e-la-personalizzazione-tech-nel-settore-moda/',
        'wwd.png' => 'https://wwd.com/business-news/technology/textile-industry-digitalization-fashiontech-solutions-1236138559/',
        'silicon_review.png' => 'https://thesiliconreview.com/magazine/profile/jacopo-thun-hohenstein-tailoor-ceo-seamless-transition-online-offline-interactions-customized-strategies',
    ];
}
