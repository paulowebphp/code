<?php include_once("header.php");?>

	<section>

		<div id="row-section-1">
				
			<div class="container">
				
				<div class="row">

					<div class="col-md-12">
						<h1>CODE SAMPLES
							<small>Este site apresenta alguns trechos de códigos meus: você gostaria de códigos assim no seu projeto?</small>
						</h1>
					</div>

				</div>
				
			</div>

		</div>


		<div id="row-section-2">
			
			<div class="container">
				<div class="row">

					<div class="col-md-6">
						<a id="block1" href="#">
							<div id="round-block1" class="roundblock">
								<i class="fa fa-code"></i>
							</div>
                        </a>
                        <p id="paragraph-block1">
                            PHP 7
                        </p>
					</div>

					<div class="col-md-6">
						<a id="block2" href="#">
							<div id="round-block2" class="roundblock">
								<i class="fa fa-connectdevelop"></i>
							</div>
                        </a>
                        <p id="paragraph-block2">
                            Javascript ES6
                        </p>
					</div>

				</div>
			</div>

		</div>
				
		<div id="row-hr-3"></div>

		<div id="row-section-3">
			
			<div class="container">

				<div class="row">

					<div class="col-md-12">

						<!--
                        
                        <ul id="tab-list" class="nav nav-tabs" role="tablist">
							<li class="active"><a href="#home">PHP 1</a></li>
							<li><a href="#menu1">PHP 2</a></li>
							<li><a href="#menu2">PHP 3</a></li>
							<li><a href="#menu3">PHP 4</a></li>
                        </ul>
                    
                        -->
                        
                        <nav>
                            <div class="nav nav-tabs" id="tab-list" role="tablist">

                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">PHP 1</a>

                                <a class="nav-item nav-link" id="nav-menu1-tab" data-toggle="tab" href="#menu1" role="tab" aria-controls="menu1" aria-selected="false">PHP 2</a>

                                <a class="nav-item nav-link" id="nav-menu2-tab" data-toggle="tab" href="#menu2" role="tab" aria-controls="menu2" aria-selected="false">PHP 3</a>

                                <a class="nav-item nav-link" id="nav-menu3-tab" data-toggle="tab" href="#menu3" role="tab" aria-controls="menu3" aria-selected="false">PHP 4</a>

                            </div>
                        </nav>
    
      					<div id="tab-languages" class="tab-content">
<div id="home" class="tab-pane fade show active"><pre class="prettyprint linenums:1">public static function validForgotDecrypt( $code )
{

    $idrecovery = mcrypt_decrypt(

        MCRYPT_RIJNDAEL_128, 
        User::SECRET, 
        base64_decode($code), 
        MCRYPT_MODE_ECB

    );//end mcrypt_decrypt

    $sql = new Sql();

    $results = $sql->select("

        SELECT * 
        FROM tb_userspasswordsrecoveries a
        INNER JOIN tb_users b USING(iduser)
        INNER JOIN tb_persons c USING(idperson)
        WHERE 
            a.idrecovery = :idrecovery
            AND
            a.dtrecovery IS NULL
            AND
            DATE_ADD(a.dtregister, INTERVAL 1 HOUR) >= NOW();
            
    ", array(

        ":idrecovery"=>$idrecovery
        
    ));

    if( count($results) === 0 )
    {
        throw new \Exception("Não foi possível recuperar a senha.");

    }//end if
    else
    {

        return $results[0];

    }//end else

}//END validForgotDecrypt

</pre>
</div>

<div id="menu1" class="tab-pane fade">
<pre class="prettyprint linenums">$app->post("/register", function()
{

    $_SESSION['registerValues'] = $_POST;

    if
    (
        !isset($_POST['name'])
        ||
        $_POST['name'] == ''
    )
    {

        User::setErrorRegister("Preencha o seu nome.");
        header("Location: /login");
        exit;

    }//end if

    if
    (
        !isset($_POST['email'])
        ||
        $_POST['email'] == ''
    
    )
    {

        User::setErrorRegister("Preencha o seu e-mail.");
        header("Location: /login");
        exit;

    }//end if

    if
    (
        !isset($_POST['password'])
        ||
        $_POST['password'] == ''
    )
    {

        User::setErrorRegister("Preencha a senha.");
        header("Location: /login");
        exit;

    }//end if

    if( User::checkLoginExist($_POST['email']) === true )
    {

        User::setErrorRegister("Este endereço de e-mail já está sendo usado por outro usuário.");
        header("Location: /login");
        exit;

    }//end if

    $user = new User();

    $user->setData(
    [
        'inadmin'=>0,
        'deslogin'=>$_POST['email'],
        'desperson'=>$_POST['name'],
        'desemail'=>$_POST['email'],
        'despassword'=>$_POST['password'],
        'nrphone'=>$_POST['phone']

    ]);

    $user->save();

    User::login($_POST['email'], $_POST['password']);

    header('Location: /checkout');
    exit;

});//END route

</pre>
</div>
                            
<div id="menu2" class="tab-pane fade">
<pre class="prettyprint linenums">public function checkPhoto()
{

    if(file_exists(

        $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
        "res" . DIRECTORY_SEPARATOR . 
        "site" . DIRECTORY_SEPARATOR . 
        "img" . DIRECTORY_SEPARATOR . 
        "products" . DIRECTORY_SEPARATOR . 
        $this->getidproduct() . ".jpg"

    ))
    {
        $url = "/res/site/img/products/" . $this->getidproduct() . ".jpg";

    }//end if
    else {

        $url = "/res/site/img/product.jpg";

    }//end else

    return $this->setdesphoto($url);

}//END checkPhoto



public function setPhoto( $file )
{

    $extension = explode('.', $file['name']);
    $extension = end($extension);

    switch ($extension)
    {

        case "jpg":
        case "jpeg":
            $image = imagecreatefromjpeg($file["tmp_name"]);
            break;

        case "gif":
            $image = imagecreatefromgif($file["tmp_name"]);
            break;

        case "png":
            $image = imagecreatefrompng($file["tmp_name"]);
            break;

    }//end switch

    $dist = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
        "res" . DIRECTORY_SEPARATOR . 
        "site" . DIRECTORY_SEPARATOR . 
        "img" . DIRECTORY_SEPARATOR . 
        "products" . DIRECTORY_SEPARATOR . 
        $this->getidproduct() . ".jpg";

    imagejpeg($image, $dist);

    imagedestroy($image);

    $this->checkPhoto();

}//END setPhoto

</pre>
</div>
                    
<div id="menu3" class="tab-pane fade">
<pre class="prettyprint linenums">public function getProducts( $related = true )
{

    $sql = new Sql();

    if ( $related === true )
    {

        return $sql->select("

            SELECT * FROM tb_products 
            WHERE idproduct IN(
                SELECT a.idproduct
                FROM tb_products a
                INNER JOIN tb_productscategories b ON a.idproduct = b.idproduct
                WHERE b.idcategory = :idcategory
                );

        ", [

            ':idcategory'=>$this->getidcategory()

        ]);//end return

    }//end if
    else {

        return $sql->select("

            SELECT * FROM tb_products 
            WHERE idproduct NOT IN(
                SELECT a.idproduct
                FROM tb_products a
                INNER JOIN tb_productscategories b ON a.idproduct = b.idproduct
                WHERE b.idcategory = :idcategory
            );

        ", [

            ':idcategory'=>$this->getidcategory()

        ]);//end return

    }//end else

}//END getProducts

</pre>
</div>
			
						</div>

					</div>
			
				</div>
			
			</div>

		</div>

		<div id="row-hr-2"></div>


	</section>

<?php include_once("footer.php");?>