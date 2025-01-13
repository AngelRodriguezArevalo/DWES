<?php
/*
¿Qué tipo de problemas podría originar un ataque XSS para los usuarios? ¿Y para el sitioweb?

- Problemas para los usuarios -

1. Robo de Información Sensible:

    Un atacante puede inyectar scripts maliciosos que capturen cookies, tokens de sesión, credenciales 
    de inicio de sesión u otros datos sensibles del usuario. Por ejemplo, si las cookies contienen tokens 
    de autenticación, un atacante puede hacerse pasar por el usuario.
   
2. Redirección a Sitios Maliciosos:
    
    Los scripts inyectados pueden redirigir a los usuarios a sitios de phishing o maliciosos diseñados para 
    robar información personal o financiera.
    
3. Robo de Identidad o Cuentas:
    
    Los scripts pueden realizar acciones en nombre del usuario, como publicar contenido no deseado, enviar 
    mensajes o incluso realizar transacciones si el usuario está autenticado.
    
4. Descarga de Malware:
    
    Los atacantes pueden inyectar scripts que automáticamente descarguen y ejecuten malware en el dispositivo 
    del usuario.
    
5. Modificación de Contenido Visualizado:
    
    Un atacante puede alterar lo que ve el usuario en la página, mostrando información falsa o engañosa para 
    manipularlo.
    

- Problemas para el sitio web -
    
1. Compromiso de la Reputación:
    
    Si los usuarios sufren ataques en un sitio web, perderán la confianza en él, lo que puede llevar a una 
    disminución en el tráfico y una reputación dañada.
    
2. Uso Malintencionado de Recursos:
    
    Los scripts maliciosos pueden abusar del sitio web, enviando spam o realizando ataques hacia otros sitios.
    
3. Compromiso de la Seguridad de los Usuarios:
    
    Si los usuarios son víctimas de XSS en un sitio, el sitio podría ser percibido como inseguro, lo que podría 
    resultar en pérdidas financieras y legales.
    
4. Pérdida de Datos Sensibles:
    
    Si un atacante obtiene acceso a tokens de sesión o datos internos del sitio mediante un ataque XSS, esto 
    puede conducir a un compromiso más profundo de la seguridad del sistema.
    
5. Acciones Indeseadas en el Sitio Web:
    
    Un atacante puede realizar modificaciones no autorizadas en la página, como insertar contenido no deseado o 
    ejecutar operaciones en el servidor utilizando privilegios del usuario autenticado.
*/
?>