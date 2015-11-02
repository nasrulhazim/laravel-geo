<?php
/**
 * Created by PhpStorm.
 * User: lorenzo
 * Date: 20/10/15
 * Time: 11.05
 */

namespace tests;
use MovEax\GeoSpatial\Point as Point;
use MovEax\GeoSpatial\LineString as LineString;
use MovEax\GeoSpatial\Geo as Geo;

class TestSpatialGeometry extends \PHPUnit_Framework_TestCase {

    public function testCreateObject(){

// TODO: aggiungere test per schema

    }

    public function testContains(){

        $cia_polygon = \MovEax\GeoSpatial\Polygon::import('41.8102359855 12.589344978300005, 41.8070211864 12.592649459799986, 41.8053257547 12.59294986719999, 41.8032783812 12.59466648099999, 41.8021267048 12.594838142400022, 41.7979677012 12.59801387790003, 41.796975899 12.599086761499962, 41.7955681533 12.60003089899999, 41.7953441909 12.600588798499984, 41.7926565811 12.602348327599998, 41.792592589 12.603163719199983, 41.7882409776 12.603464126599988, 41.7881289837 12.600760459900016, 41.7880489879 12.598185539200017, 41.7880729867 12.597455978400035, 41.7882249785 12.596726417500008, 41.796959902 12.587971687300069, 41.7976337695 12.587268948600013, 41.7986755507 12.58609414099999, 41.800535118 12.584002017999978, 41.8015148684 12.583090066900013, 41.8025425904 12.582285404199979, 41.8052857676 12.579495906800048, 41.8067932654 12.578026056300018, 41.8082367513 12.576899528500007, 41.8096122311 12.579624652900065, 41.8109237077 12.582349777199966, 41.8094283024 12.584238052399996, 41.8092243808 12.585192918799976, 41.8092203823 12.586126327499983, 41.8098521374 12.587478160899991, 41.8105958411 12.588797807699962, 41.8105278685 12.589092850700013, 41.8102359855 12.589344978300005');

        $pointok = new Point(41.80433406634592, 12.589302062988281);
        $pointko = new Point(1,2);

        assertTrue(Geo::contains($cia_polygon,$pointok));
        assertFalse(Geo::contains($cia_polygon,$pointko));

    }

    public function testIntersect(){
        $p1 = new Point(41.92986831448579, 12.429313659667969);
        $p2 = new Point(41.875696393231, 12.557373046875);

        $p3 = new Point(41.93982889838199, 12.515830993652344);
        $p4 = new Point(41.859844975978454, 12.423820495605469);

        $l1 = new LineString([$p1, $p2]);
        $l2 = new LineString([$p3, $p4]);

        $res = Geo::intersect($l1, $l2);
        assertTrue(count($res) > 0);
        assertTrue($res[0] instanceof Point);

    }

}