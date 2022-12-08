<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CategoryDescription;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('home');
    }

    public function makeQueries()
    {
        $command = '';

        $rows = Product::select('product_id', 'model')->pluck('model','product_id');

        foreach($rows as $product_id => $product_title)
        {
            

            $description = htmlspecialchars("HD Car Covers premium outdoor waterproof car cover is our top of the range car cover for your ".$product_title.". Our heavy duty car covers are perfectly fit for all variations of the ".$product_title.". <br>
            If you’re looking for the best all weather car cover, our HD premium outdoor waterproof car cover is a reliable source for protection.<br><br>
            <h4><b>".$product_title." Car Covers Description:</b></h4>
            Our HD ".$product_title." waterproof outdoor car cover is made of high-quality polypropylene which offers outstanding resistance to the harsh elements, In addition to safeguarding a vehicle's interior and exterior, it also provides as a steal barrier by hiding your car from thieves.<br><br>
            <h4><b>Features:</b></h4>
            Guaranteed perfect fit<br>
            5 tie down buckle straps to keep it secure<br>
            Fully waterproof and breathable due to the heavy duty micro-porous oil based materials used <br>
            The fluffy inner fleece ensures the cover is gentle to your paint.<br>
            Both the front and rear hems are elasticated to allow for a snug fit.<br><br>
            <h4><b>HD Car Covers protect your car from:</b></h4>
            Bird Droppings <br>
            Dangerous UV Sunlight Rays <br>
            Acid Rain<br>
            Heavy Dust <br>
            Mildew Fungal <br>
            Tree Sap (Fluid)<br>
            Dirt<br><br>
            <h4><b>HD Car Covers Premium Indoor car cover option</b></h4>
            The indoor car cover option is similar to our Premium outdoor cover. It has all the features and characteristics of the premium outdoor cover however without the thick waterproof coated layer therefore not making it waterproof. The premium indoor cover is designed for vehicles which are to be stored indoors", ENT_QUOTES);

            $product_img_text = "Image for illustration. Your cover will fit the ".$product_title;

            $command .= "UPDATE oc_product SET product_img_text = '".$product_img_text."'  WHERE product_id = ".$product_id."; ";
            $command .= 'UPDATE oc_product_description SET description = "'.$description.'"  WHERE product_id = '.$product_id.'; ';
            $command .= "<br><br>";

        }

        
            print_r($command); 
            
    }

    public function makeCategoryQueries()
    {
        $command = '';

        $rows = CategoryDescription::select('category_id', 'name')->orderBy('category_id', 'asc')->pluck('name','category_id');
        foreach ($rows as $cat_id => $name) {
            
            $desc = htmlspecialchars("<h3 style='text-align: center; '>".strtoupper($name)." CAR COVERS</h3><div style='text-align: center;'>Please select the model below to see which ".$name." tailored indoor and outdoor waterproof car covers are available.&nbsp;</div>", ENT_QUOTES);

            $command .= 'UPDATE oc_category_description SET description = "'.$desc.'" WHERE oc_category_description.category_id = '.$cat_id.' AND oc_category_description.language_id = 1;';
            
        // print_r($command); die;
            
        }
            
        // print_r($command); die;
        // print_r($command); die;
    }

}
