<?php


namespace cl\lanixerp\pos\modelo\producto;
use JMS\Serializer\Annotation as Serializer;
use Lanix\LxRestClient;
use Lanix\LxUtilDB;
use PrestaShop\PrestaShop\Adapter\Entity\Configuration;
use PrestaShop\PrestaShop\Adapter\Entity\PrestaShopLogger;
use PrestaShop\PrestaShop\Adapter\Entity\Product;
use PrestaShop\PrestaShop\Adapter\Entity\Image;
use PrestaShop\PrestaShop\Adapter\Entity\ImageManager;
use PrestaShop\PrestaShop\Adapter\Entity\ImageType;
use PrestaShop\PrestaShop\Adapter\Entity\Tools;
use PrestaShop\PrestaShop\Adapter\Entity\Search;
use PrestaShop\PrestaShop\Adapter\Entity\Context;
use PrestaShop\PrestaShop\Adapter\Entity\PrestaShopException;
use PrestaShop\PrestaShop\Adapter\Entity\PrestaShopDatabaseException;

/** @Serializer\XmlRoot ("producto") */
class Producto
{
    private $psProduct;

    /** @Serializer\Type ("string") */
    private $codigo;

    /** @Serializer\Type ("string") */
    private $descripcion;

    /**
     * @return mixed
     */
    public function getCodigoTipo()
    {
        return $this->codigoTipo;
    }

    /**
     * @param mixed $codigoTipo
     */
    public function setCodigoTipo($codigoTipo)
    {
        $this->codigoTipo = $codigoTipo;
    }

    /** @Serializer\Type ("integer") */
    private $codigoTipo;

    /** @Serializer\Type ("boolean") */
    private $vigente;

    /** @Serializer\Type ("string") */
    private $glosa;

    /** @Serializer\Type ("string") */
    private $comentario;

    /**
     * @return mixed
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * @param mixed $comentario
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    }

    /**
     * @Serializer\XmlKeyValuePairs
     * @Serializer\Type("Lanix\Familia")
     **/
    private $familia;

    /**
     * @Serializer\XmlKeyValuePairs
     * @Serializer\Type("Lanix\SubFamilia")
     **/
    private $subFamilia;

    /**
     * @Serializer\XmlKeyValuePairs
     * @Serializer\Type("Lanix\UmPrincipal")
     **/
    private $umPrincipal;

    /** @Serializer\Type ("integer") */
    private $decimalesUmPrincipal;

    /** @Serializer\Type ("integer") */
    private $decimalesUmAlternativa;

    /** @Serializer\Type ("integer") */
    private $costo;

    /** @Serializer\Type ("integer") */
    private $precioVenta;

    /** @Serializer\Type ("integer") */
    private $indiceImagenDefecto;

    /** @Serializer\Type ("string") */
    private $indicadorExencion;

    public function __construct(){
    }

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getFamilia()
    {
        return $this->familia;
    }

    /**
     * @param mixed $familia
     */
    public function setFamilia($familia)
    {
        $this->familia = $familia;
    }

    /**
     * @return mixed
     */
    public function getSubFamilia()
    {
        return $this->subFamilia;
    }

    /**
     * @param mixed $subFamilia
     */
    public function setSubFamilia($subFamilia)
    {
        $this->subFamilia = $subFamilia;
    }

    /**
     * @return mixed
     */
    public function getUmPrincipal()
    {
        return $this->umPrincipal;
    }

    /**
     * @param mixed $umPrincipal
     */
    public function setUmPrincipal($umPrincipal)
    {
        $this->umPrincipal = $umPrincipal;
    }

    /**
     * @return mixed
     */
    public function getDecimalesUmPrincipal()
    {
        return $this->decimalesUmPrincipal;
    }

    /**
     * @param mixed $decimalesUmPrincipal
     */
    public function setDecimalesUmPrincipal($decimalesUmPrincipal)
    {
        $this->decimalesUmPrincipal = $decimalesUmPrincipal;
    }

    /**
     * @return mixed
     */
    public function getDecimalesUmAlternativa()
    {
        return $this->decimalesUmAlternativa;
    }

    /**
     * @param mixed $decimalesUmAlternativa
     */
    public function setDecimalesUmAlternativa($decimalesUmAlternativa)
    {
        $this->decimalesUmAlternativa = $decimalesUmAlternativa;
    }

    /**
     * @return mixed
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * @param mixed $costo
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;
    }

    /**
     * @return mixed
     */
    public function getPrecioVenta()
    {
        return $this->precioVenta;
    }

    /**
     * @param mixed $precioVenta
     */
    public function setPrecioVenta($precioVenta)
    {
        $this->precioVenta = $precioVenta;
    }

    /**
     * @return mixed
     */
    public function getIndiceImagenDefecto()
    {
        return $this->indiceImagenDefecto;
    }

    /**
     * @param mixed $indiceImagenDefecto
     */
    public function setIndiceImagenDefecto($indiceImagenDefecto)
    {
        $this->indiceImagenDefecto = $indiceImagenDefecto;
    }

    /**
     * @return mixed
     */
    public function getIndicadorExencion()
    {
        return $this->indicadorExencion;
    }

    /**
     * @param mixed $indicadorExencion
     */
    public function setIndicadorExencion($indicadorExencion)
    {
        $this->indicadorExencion = $indicadorExencion;
    }


    /**
     * @return mixed
     */
    public function getVigente()
    {
        return $this->vigente;
    }

    /**
     * @param mixed $vigente
     */
    public function setVigente($vigente)
    {
        $this->vigente = $vigente;
    }

    /**
     * @return mixed
     */
    public function getGlosa()
    {
        return $this->glosa;
    }

    /**
     * @param mixed $glosa
     */
    public function setGlosa($glosa)
    {
        $this->glosa = $glosa;
    }


    public function save () {


        if ($this->codigo === null || $this->codigo == null || empty($this->codigo))
        {
            PrestaShopLogger::addLog('Sin código','1','','Producto','',true);
            return;
        }

        if ($this->descripcion === null || $this->descripcion == null || empty($this->descripcion))
        {
            PrestaShopLogger::addLog('Sin descripción','1','','Producto',$this->codigo,true);
            return;
        }


        if ($this->familia === null || $this->familia == null)
        {
            PrestaShopLogger::addLog('Sin familia','1','','Producto',$this->codigo,true);
            return;
        }



        $homeCat = Configuration::get('PS_HOME_CATEGORY');

        //búsqueda de codigo existente en sistema
        $searchID = LxUtilDB::getIdPShopByLxCod('lx_productos',$this->codigo);

//        dump($searchID);


        //get id pshop Categoria Producto

        $codFamilia = $this->familia->getCodigo();
        $psFamilia = LxUtilDB::selectFromTblGenericaWhere(
            'id_pshop',
            73,
            'codigo = "'.$codFamilia.'"'
        );


        $psSubFamilia = null;
        if ($this->subFamilia !== null && $this->subFamilia != null) {

            $codSubFamilia = $this->subFamilia->getCodigo();
            $psSubFamilia = LxUtilDB::selectFromTblGenericaWhere(
                'id_pshop',
                74,
                'codigo = "' . $codSubFamilia . '"');
        }



        //get Unidad de medida
        $unidadMedida = $this->umPrincipal->getDescripcion();

        if (Configuration::get('LX_PRECIOSNETOS') == 'true'){
           $taxRule=1;
        }else{
            $taxRule=0;
        }

        //esto fue deshabilitado
        //la razon es que searchByName ocupa por debajo un operador LIKE
        //de SQL, lo que devuelve matches poco precisos y lleva a errores
        //en productos de nombres parcialmente coincidentes
//        $foundByName = Product::searchByName(Configuration::get('PS_LANG_DEFAULT'),$this->descripcion);


        $productCondition = $searchID == false || $searchID == null;

        /*
        if (Configuration::get('LX_PREVENT_DUPLICATES_PRODUCTS') == "true"){
            $productCondition = ($searchID == false || $searchID == null) &&
                $foundByName == false;
        }*/

        $testLog = $this->descripcion;

        //1er caso: no hay match por id ni por nombre
        //se crea nuevo producto
        if ($productCondition ){

//            dump('1er if');
            $testLog = $testLog.' 1er if';
            $product = new Product();
            $product->name = array((int)Configuration::get('PS_LANG_DEFAULT') => $this->descripcion);
            $product->category = $homeCat;
            if ($psSubFamilia != null) {
                $product->id_category_default = (int)$psSubFamilia;
            }else{
                $product->id_category_default = (int)$psFamilia;
            }
            $product->id_manufacturer = Configuration::get('LX_DEFAULT_MANUFACTURER');
            $product->description = array((int)Configuration::get('PS_LANG_DEFAULT') => $this->comentario);
            $product->description_short = array((int)Configuration::get('PS_LANG_DEFAULT') => $this->glosa);
            $product->active = ($this->vigente && (int)$this->precioVenta > 0);
            $product->price = $this->precioVenta;
            $product->unity = $unidadMedida;
            $product->is_virtual = $this->codigoTipo == 200;
            $product->unit_price = $this->precioVenta;
            $product->id_tax_rules_group = $taxRule;
            $product->wholesale_price = $this->costo;

            try {
                $product->save();
                $product->updateCategories(array_unique([$homeCat,$psFamilia,$product->id_category_default]));
                $this->addImg($product);
                //ini_set('max_execution_time', 7200);
                $data = [
                    'lx_codigo' => $this->codigo,
                    'id_pshop'=>$product->id];
                LxUtilDB::saveData('lx_productos',$data);
                LxUtilDB::updateTblSync('productos');

            }catch (\PrestaShopException $e){
                dump($e->getMessage());
            }

        }
        //2do caso: match por id
        // se actualiza producto
        elseif (!empty($searchID)) {

            dump('2do if');
            $testLog = $testLog.' 2do if';
            $psId = LxUtilDB::getIdPShopByLxCod('lx_productos',$this->codigo);

            $product = new Product($psId,null,Configuration::get('PS_LANG_DEFAULT'),1);
            $product->name = array((int)Configuration::get('PS_LANG_DEFAULT') => $this->descripcion);
            $product->id_manufacturer = Configuration::get('LX_DEFAULT_MANUFACTURER');
            if ($psSubFamilia != null) {
                $product->id_category_default = (int)$psSubFamilia;
            }else{
  //              dump('subfamilia null');
                $product->id_category_default = (int)$psFamilia;
            }
            $product->price = $this->precioVenta;
            $product->description = array((int)Configuration::get('PS_LANG_DEFAULT') => $this->comentario);
            $product->description_short = array((int)Configuration::get('PS_LANG_DEFAULT') => $this->glosa);
            $product->active = ($this->vigente && (int)$this->precioVenta > 0);
            $product->is_virtual = $this->codigoTipo == 200;
            $product->unity = $this->umPrincipal->getDescripcion();
            $product->unit_price = $this->precioVenta;
            $product->id_tax_rules_group = $taxRule;
            $product->wholesale_price = $this->costo;

            try {
                $product->save();
                $product->updateCategories(array_unique([$homeCat,$psFamilia,$product->id_category_default]),true);
                $this->addImg($product);
                LxUtilDB::updateTblSync('productos');
            }
            catch (\PrestaShopException $exception){
                dump($exception->getMessage());
            }

        }
        //3er caso: prevenir duplicados por nombre,
        // solo si opcion esta marcada
/*        elseif (Configuration::get('LX_PREVENT_DUPLICATES_PRODUCTS') == "true"){
            dump('3er if, se previene duplicado');
            $testLog = $testLog.' 3er if';
            if (count($foundByName) > 0){
                //asociar primera ocurrencia,
                //de momento no se maneja opción con más ocurrencias
                $data = [
                    'lx_codigo' => $this->codigo,
                    'id_pshop'=>$foundByName[0]['id_product']];
                LxUtilDB::saveData('lx_productos',$data);
                LxUtilDB::updateTblSync('productos');
            }
        }*/
        //log que usé para test
        //PrestaShopLogger::addLog($testLog,'1','','Producto',null,true);

    }


    protected function addImg($product)
    {
        /** @var $product Product */

        $array = LxRestClient::getImage($this->codigo);
        if ($array == null) return;

        $imgName = $array['name'];
        $imgContent  = $array['content'];

        if ($imgName == null|| $imgContent == null) return;

        $watermark_types = explode(',', Configuration::get('WATERMARK_TYPES'));
        $tmpfile = tempnam(_PS_TMP_IMG_DIR_, 'ps_import');
        file_put_contents($tmpfile, $imgContent);

        $image_obj = new Image();
        $image_obj->id_product = $product->id;
        $image_obj->position = Image::getHighestPosition($product->id) + 1;
        $image_obj->cover = true; // or false;


        //borrar img existentes
        $searchExistentImg = $product->getImages(Configuration::get('PS_LANG_DEFAULT'));
        if (count($searchExistentImg)>0) {
            foreach ($searchExistentImg as $img){
                $foundImage= new Image($img['id_image']);
                $foundImage->delete();
            }
        }


        if (($image_obj->validateFields(false, true)) === true &&
            ($image_obj->validateFieldsLang(false, true)) === true && $image_obj->add()) {

            $path = $image_obj->getPathForCreation();
            ImageManager::resize($tmpfile, $path . '.jpg');
            $images_types = ImageType::getImagesTypes('products');

            foreach ($images_types as $image_type) {
                ImageManager::resize($tmpfile, $path . '-' . stripslashes($image_type['name']) . '.jpg', $image_type['width'], $image_type['height']);
                if (in_array($image_type['id_image_type'], $watermark_types))
                    Hook::exec('actionWatermark', array('id_image' => $image_obj->id, 'id_product' => $product->id));
            }

        }
        unlink($tmpfile);

    }
}
