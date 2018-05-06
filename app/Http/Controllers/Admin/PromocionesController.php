<?php

namespace multiventas\Http\Controllers\Admin;

use Illuminate\Http\Request;
use multiventas\Http\Controllers\Controller;
use multiventas\Models\promocion;

class PromocionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'title' => 'Crear Promocion',
        ];
        return view('admin.promociones.promociones_create')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
        /**
     * Funcion que se encarga de buscar en la bd el correo electronico
     *@param $email a buscar en la bd de administradores
     * @return  devuelve la informacion del usuario
     */
  public static function buscarEmail($email)
  {
  $usuario=DB::table('cliente')
  ->select('name','password')
  ->Where('email',$email)
  ->first();

  return $usuario;
  }


 /**
     * Funcion que se encarga de enviar un correo electronico al admin si se le olvido la clave
     * @return  vuelve a la vista donde  se realizo la peticiòn
     */

    public function postEmail(){
        $email=Input::get('fp_email');
        $mensaje="contraseña:";
        $asunto="Liz salon";
        $cadena=usuario::buscarEmail($email);
        $digest= Crypt::decrypt($cadena->password);

        $data_toview = array();
        $data_toview['name'] = $mensaje.$digest;

        $email_sender   = "3015mary@gmail.com";
        $email_pass     = 'zopenka123';
        $email_to    = $email;

        $backup = \Mail::getSwiftMailer();
       
        try{

            $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 587, 'tls');
            $transport->setUsername($email_sender);
            $transport->setPassword($email_pass);

            $gmail = new Swift_Mailer($transport);

            \Mail::setSwiftMailer($gmail);

            $data['emailto'] =$email_to;  
            $data['sender'] = $email_sender;
            $data['asunto']=$asunto;
           
       

            Mail::send('emails.html', $data_toview, function($message) use ($data)
            {

                $message->from($data['sender'], 'Administrador');
                $message->to($data['emailto'])
                ->replyTo($data['sender'], 'Administrador')
                ->subject($data['asunto']);

                echo 'Correo enviado con exito';

            });

        }catch(\Swift_TransportException $e){
            $response = $e->getMessage() ;
            echo $response;
        }

        
        Mail::setSwiftMailer($backup);


        return Redirect::to('password')->with('success','Envio  Exitoso');
    }

}

