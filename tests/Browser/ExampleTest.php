<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Storage;
class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(Storage::get('url.txt'));
           // $browser->pause(5000);
            try{
                $browser->click('.close-layer');
                $browser->pause(2000);
            }
            catch(Exception $e){
 
            }
            
         try{
                $browser->click('#j-shipping-company');
                $browser->pause(3000);
                $elements = $browser->elements('#j-shipping-dialog');
               foreach ($elements as $element) {
                    $data[] = $element->getAttribute('innerHTML');
                }
                Storage::put('data.txt',$data);
              
            }
            catch(Exception $e){
                $this->data = $e;
            }
        });
    }
}
