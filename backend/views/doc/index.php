<?php

/** @var yii\web\View $this */

$this->title = 'Web API';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Web API</h1>

        <p class="lead">¡Bienvenido!</p>

   </div>
   <hr>
 <div class=" text-center ">
   <h1>
   Endpoits disponibles
   </h1>
   <hr>
 </div>
    <div class="body-content">

        <div class="colunm">
            <div class="row-lg-4">
                <h2>Client:</h2>
        
               <h3>
               <code><span style="background-color:cornflowerblue; color:white; border-radius:5px; padding:0 3px 0 3px">POST</span></code> 
               </h3>
               <h3>
                
               <code>Add: http://backend.test/mnt/client</code>
               </h3>
               <pre>
                 <code>
                body:{
                    id:null,
                    name:Juan,	
                    age:28,
                    id_profile:1,
                    id_address:1	
                }
               </code>
               </pre>
               <hr>
               <h3>
               <code><span style="background-color:cornflowerblue; color:white; border-radius:5px; padding:0 3px 0 3px">PUT</span></code> 
               </h3>
               <h3>
               <code>Update: http://backend.test/mnt/client</code> 
               
               </h3>
               <pre>
                 <code>
                body:{
                    id:1	
                    name:Juan	
                    age:28
                }
               </code>
               </pre>
               <hr>
               <h3>
               <code><span style="background-color:cornflowerblue; color:white; border-radius:5px; padding:0 3px 0 3px">GET</span></code> 
               </h3>
               <h3>
               <code>List: http://backend.test/mnt/client</code> 
               </h3>
               <h3>
               <code>Item: http://backend.test/mnt/client/{id}</code> 
               </h3>
               <hr>
               <h3>
               <code><span style="background-color:cornflowerblue; color:white; border-radius:5px; padding:0 3px 0 3px">DELETE</span></code> 
               </h3>
               <h3>
               <code>Delete: http://backend.test/mnt/client/{id}</code> 
               </h3>
                </div>
                <hr>
                <br>
            <div class="row-lg-4">
                <h2>Profile</h2>
            
                <h3>
               <code><span style="background-color:cornflowerblue; color:white; border-radius:5px; padding:0 3px 0 3px">POST</span></code> 
               </h3>
               <h3>
               <code>Add: http://backend.test/mnt/profile</code> 
               
               </h3>
               <pre>
                 <code>
                 body:{
                    id:null,
                    career:Software,
                    language:Español,
                    nationality:Dominicana
                }
               </code>
               </pre>
               <hr>
               <h3>
               <code><span style="background-color:cornflowerblue; color:white; border-radius:5px; padding:0 3px 0 3px">PUT</span></code> 
           
               </h3>
                  <h3>
               <code>Update: http://backend.test/mnt/profile</code> 
               
               </h3>
               <pre>
                 <code>
                body:{
                    id:1,
                    career:Software,
                    language:Español,
                    nationality:Dominicana
                }
               </code>
               </pre>
               <hr>
               <h3>
                 <code><span style="background-color:cornflowerblue; color:white; border-radius:5px; padding:0 3px 0 3px">GET</span></code> 
               </h3>
               <h3>
               <code>List: http://backend.test/mnt/profile</code> 
               </h3>
               <h3>
               <code>Item: http://backend.test/mnt/profile/{id}</code> 
               </h3>
               <hr>
               <h3>
               <code><span style="background-color:cornflowerblue; color:white; border-radius:5px; padding:0 3px 0 3px">DELETE</span></code> 
               </h3>
               <h3>
               <code>Delete: http://backend.test/mnt/profile/{id}</code> 
                
               </h3>
               
            </div>
            <hr>
                <br>
            <div class="row-lg-4">
                <h2>Address</h2>
                <h3>
               <code><span style="background-color:cornflowerblue; color:white; border-radius:5px; padding:0 3px 0 3px">POST</span></code> 
               </h3>
                <h3>
               <code>Add: http://backend.test/mnt/address</code> 
               
               </h3>
               <pre>
                 <code>
                 body:{
                    id:null,
                    career:Software,
                    language:Español,
                    nationality:Dominicana
                }
               </code>
               </pre>
               <hr>
               <h3>
               <code><span style="background-color:cornflowerblue; color:white; border-radius:5px; padding:0 3px 0 3px">PUT</span></code> 
           
               </h3>
                 <h3>
               <code>Update: http://backend.test/mnt/address</code> 
               
               </h3>
               <pre>
                 <code>
                body:{
                  id:1,
                  street:C/prueba,
                  no_apartment:5,
                  city:Santo Domingo
                }
               </code>
               </pre>
               <hr>
             
               <h3>
                 <code><span style="background-color:cornflowerblue; color:white; border-radius:5px; padding:0 3px 0 3px">GET</span></code> 
               </h3>
               <h3>
               <code>List: http://backend.test/mnt/address</code> 
               </h3>
               <h3>
               <code>Item: http://backend.test/mnt/address/{id}</code> 
               </h3>
               <hr>
               <h3>
               <code><span style="background-color:cornflowerblue; color:white; border-radius:5px; padding:0 3px 0 3px">DELETE</span></code> 
               </h3>
               <h3>
               <code>Delete: http://backend.test/mnt/address/{id}</code> 
                
               </h3>
               

              </div>
              <hr>
                <br>
            </div>

    </div>
</div>
