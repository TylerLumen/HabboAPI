<?php
/**
 * The HabboAPI class contains all the nice methods
 */
namespace HabboAPI;

/** Class HabboAPI
 *
 * Contains all the nice methods for the HabboAPI
 *
 * @package HabboAPI
 */
class HabboAPI
{

    /** Base URL for the Habbo API
     *
     * @var string
     */
    private $api_base = 'https://beta.habbo.com/api/public/';

    /** Class variable for HabboParser
     *
     * @var \HabboAPI\HabboParser
     */
    private $parser;

    /** Can override the API base URL
     *
     * @param string $api_base - Base URL for the API endpoint; https://beta.habbo.com/api/public/
     */
    public function setApiBase($api_base)
    {
        $this->api_base = $api_base;
    }

    /** Based on a username, get a simplified Habbo object
     *
     * @param $habboname
     * @return Entities\Habbo
     */
    public function getHabbo($habboname)
    {
        $this->parser = new HabboParser($this->api_base);
        return $this->parser->parseHabbo($habboname);
    }

    /** Based on a unique ID, get a full Habbo profile object
     *
     * @param $id The unique ID system Habbo uses for their api. Starts with "hhus-"
     * @return array
     */
    public function getProfile($id)
    {
        $this->parser = new HabboParser($this->api_base);
        return $this->parser->parseProfile($id);
    }

}