<?php

namespace App\Commands;

class SaveActivitiesCommand
{
    /**
     *
     * @param string $url
     * @param string $date
     */
    public function __construct(private string $url, private string $date) 
    {    	
    } 

    /**
     *     
     * @return string
     */
    public function getUrl() : string
    {
        return $this->url;
    }

    /**
     *     
     * @return string
     */
    public function getDate() : string
    {
        return $this->date;
    } 
}
