<?php

class HtmlParser
{
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Получение содержимого html страницы
     *
     * @return string
     */
    public function getPage()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->url);
        // Получить страницу как строку
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $pageContent = curl_exec($ch);
        curl_close($ch);

        return $pageContent;
    }

    /**
     * Получение всех тегов html страницы
     *
     * @return array
     */
    public function getTags()
    {
        $tags = [];
        if (!empty($pageContent = $this->getPage())) {
            // Начало с '<'
            // затем любые строчные || заглавные буквы || цифры || '!' || '!--', в произвольном кол-ве
            // в конце 'пробел' || '>'
            $regexpTag = '/<([a-z1-9A-Z!--]*)[ |>]/';
            preg_match_all($regexpTag, $pageContent, $matchesTag);
            $tags = array_count_values($matchesTag[1]);
        }
        return $tags;
    }

}