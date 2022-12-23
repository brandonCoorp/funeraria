package analizadortecno.jcup.jcupprueba.prueba3;
import java_cup.runtime.Symbol;
%%
%class LexerCupparam3
%type java_cup.runtime.Symbol
%cup
%full
%line
%char
L=[a-zA-Z_]+
D=[0-9]+
S= [a-zA-Z0-9!#?¿_ ]+ 
NS =[0-9a-zA-Z!#?¿ ]+  
espacio=[ ,\t,\r,\n]+
%{
    private Symbol symbol(int type, Object value){
        return new Symbol(type, yyline, yycolumn, value);
    }
    private Symbol symbol(int type){
        return new Symbol(type, yyline, yycolumn);
    }
%}
%%
/* S= [a-zA-Z0-9]+ [.@?!#]? [a-zA-Z0-9]+    S= [a-zA-Z0-9]+   */

/* Espacios en blanco */
{espacio} {/*Ignore*/}

/* Comentarios */
( "//"(.)* ) {/*Ignore*/}


/*terminal Linea, date,ComasString,flotante,entero,boleano, ERROR,ParentesisA,ParentesisB,coma,dospuntos,
INSSUC,MODSUC,VERSUC,DELSUC,campo_nombre,campo_direccion,campo_descripcion,campo_telefono,
INSCLI,MODCLI,DELCLI,VERCLI,campo_nombre,campo_apellidoP,campo_apellidoM,campo_direccion,campo_tipo,campo_telefono;*/


/* coma */
( "-" ) {return new Symbol(sym.Separador, yychar, yyline, yytext());}



/*Operadores Logicos */
( ">" ) {return new Symbol(sym.Mayor, yychar, yyline, yytext());}
( "<" ) {return new Symbol(sym.Menor, yychar, yyline, yytext());}
( "==" ) {return new Symbol(sym.Igual, yychar, yyline, yytext());}
( "!=" ) {return new Symbol(sym.Diferente, yychar, yyline, yytext());}
( ">=" ) {return new Symbol(sym.MayorIgual, yychar, yyline, yytext());}
( "<=" ) {return new Symbol(sym.MenorIgual, yychar, yyline, yytext());}
( "<>" ) {return new Symbol(sym.Contiene, yychar, yyline, yytext());}
( BETWEEN ) {return new Symbol(sym.BETWEEN, yychar, yyline, yytext());}
( YY ) {return new Symbol(sym.YY, yychar, yyline, yytext());}
( OO ) {return new Symbol(sym.OO, yychar, yyline, yytext());}
( AND ) {return new Symbol(sym.AND, yychar, yyline, yytext());}



/* Palabra reservadas */
( INSSUC ) {return new Symbol(sym.INSSUC, yychar, yyline, yytext());}
( MODSUC ) {return new Symbol(sym.MODSUC, yychar, yyline, yytext());}
( VERSUC ) {return new Symbol(sym.VERSUC, yychar, yyline, yytext());}
( DELSUC ) {return new Symbol(sym.DELSUC, yychar, yyline, yytext());}

( INSCLI ) {return new Symbol(sym.INSCLI, yychar, yyline, yytext());}
( MODCLI ) {return new Symbol(sym.MODCLI, yychar, yyline, yytext());}
( DELCLI ) {return new Symbol(sym.DELCLI, yychar, yyline, yytext());}
( VERCLI ) {return new Symbol(sym.VERCLI, yychar, yyline, yytext());}

( INSUSR ) {return new Symbol(sym.INSUSR, yychar, yyline, yytext());}
( MODUSR ) {return new Symbol(sym.MODUSR, yychar, yyline, yytext());}
( DELUSR ) {return new Symbol(sym.DELUSR, yychar, yyline, yytext());}
( VERUSR ) {return new Symbol(sym.VERUSR, yychar, yyline, yytext());}

( INSITM ) {return new Symbol(sym.INSITM, yychar, yyline, yytext());}
( MODITM ) {return new Symbol(sym.MODITM, yychar, yyline, yytext());}
( DELITM ) {return new Symbol(sym.DELITM, yychar, yyline, yytext());}
( VERITM ) {return new Symbol(sym.VERITM, yychar, yyline, yytext());}


( INSSRV ) {return new Symbol(sym.INSSRV, yychar, yyline, yytext());}
( MODSRV ) {return new Symbol(sym.MODSRV, yychar, yyline, yytext());}
( DELSRV ) {return new Symbol(sym.DELSRV, yychar, yyline, yytext());}
( VERSRV ) {return new Symbol(sym.VERSRV, yychar, yyline, yytext());}
( INSSRI ) {return new Symbol(sym.INSSRI, yychar, yyline, yytext());}
( DELSRI ) {return new Symbol(sym.DELSRI, yychar, yyline, yytext());}

( INSROL ) {return new Symbol(sym.INSROL, yychar, yyline, yytext());}
( MODROL ) {return new Symbol(sym.MODROL, yychar, yyline, yytext());}
( VERROL ) {return new Symbol(sym.VERROL, yychar, yyline, yytext());}
( DELROL ) {return new Symbol(sym.DELROL, yychar, yyline, yytext());}

( INSPAG ) {return new Symbol(sym.INSPAG, yychar, yyline, yytext());}
( MODPAG ) {return new Symbol(sym.MODPAG, yychar, yyline, yytext());}
( VERPAG ) {return new Symbol(sym.VERPAG, yychar, yyline, yytext());}
( DELPAG ) {return new Symbol(sym.DELPAG, yychar, yyline, yytext());}

( INSPAQ ) {return new Symbol(sym.INSPAQ, yychar, yyline, yytext());}
( MODPAQ ) {return new Symbol(sym.MODPAQ, yychar, yyline, yytext());}
( DELPAQ ) {return new Symbol(sym.DELPAQ, yychar, yyline, yytext());}
( VERPAQ ) {return new Symbol(sym.VERPAQ, yychar, yyline, yytext());}
( INSPAS ) {return new Symbol(sym.INSPAS, yychar, yyline, yytext());}
( DELPAS ) {return new Symbol(sym.DELPAS, yychar, yyline, yytext());}


( INSCPA ) {return new Symbol(sym.INSCPA, yychar, yyline, yytext());}
( VERCPA ) {return new Symbol(sym.VERCPA, yychar, yyline, yytext());}
( DELCPA ) {return new Symbol(sym.DELCPA, yychar, yyline, yytext());}



( MOVACT ) {return new Symbol(sym.MOVACT, yychar, yyline, yytext());}
( VERCOM ) {return new Symbol(sym.VERCOM, yychar, yyline, yytext());}
( VERCTT ) {return new Symbol(sym.VERCTT, yychar, yyline, yytext());}
( MODCOM ) {return new Symbol(sym.MODCOM, yychar, yyline, yytext());}
( MODCTT ) {return new Symbol(sym.MODCTT, yychar, yyline, yytext());}

( VSRCTT ) {return new Symbol(sym.VSRCTT, yychar, yyline, yytext());}
( -HELPS ) {return new Symbol(sym.HELPS, yychar, yyline, yytext());}

( REPEST ) {return new Symbol(sym.REPEST, yychar, yyline, yytext());}
( All ) {return new Symbol(sym.All, yychar, yyline, yytext());}


/* Atributos */
( campo_nombre ) {return new Symbol(sym.campo_nombre, yychar, yyline, yytext());}
( campo_apellidoP ) {return new Symbol(sym.campo_apellidoP, yychar, yyline, yytext());}
( campo_apellidoM ) {return new Symbol(sym.campo_apellidoM, yychar, yyline, yytext());}
( campo_descripcion ) {return new Symbol(sym.campo_descripcion, yychar, yyline, yytext());}
( campo_direccion ) {return new Symbol(sym.campo_direccion, yychar, yyline, yytext());}
( campo_telefono ) {return new Symbol(sym.campo_telefono, yychar, yyline, yytext());}
( campo_tipo ) {return new Symbol(sym.campo_tipo, yychar, yyline, yytext());}

( campo_id ) {return new Symbol(sym.campo_id, yychar, yyline, yytext());}

( campo_cod_item ) {return new Symbol(sym.campo_cod_item, yychar, yyline, yytext());}
( campo_cantidad ) {return new Symbol(sym.campo_cantidad, yychar, yyline, yytext());}
( campo_estado ) {return new Symbol(sym.campo_estado, yychar, yyline, yytext());}
( campo_costo_unitario ) {return new Symbol(sym.campo_costo_unitario, yychar, yyline, yytext());}

( campo_sucursal_id ) {return new Symbol(sym.campo_sucursal_id, yychar, yyline, yytext());}
( campo_persona_id ) {return new Symbol(sym.campo_persona_id, yychar, yyline, yytext());}

( campo_sucursal ) {return new Symbol(sym.campo_sucursal, yychar, yyline, yytext());}
( campo_item ) {return new Symbol(sym.campo_item, yychar, yyline, yytext());}
( campo_servicio ) {return new Symbol(sym.campo_servicio, yychar, yyline, yytext());}
( campo_fecha ) {return new Symbol(sym.campo_fecha, yychar, yyline, yytext());}
( campo_fecha_entrega ) {return new Symbol(sym.campo_fecha_entrega, yychar, yyline, yytext());}
( campo_paquete ) {return new Symbol(sym.campo_paquete, yychar, yyline, yytext());}
( campo_pago ) {return new Symbol(sym.campo_pago, yychar, yyline, yytext());}
( campo_compra_id ) {return new Symbol(sym.campo_compra_id, yychar, yyline, yytext());}
( campo_motivo ) {return new Symbol(sym.campo_motivo, yychar, yyline, yytext());}


( campo_rol ) {return new Symbol(sym.campo_rol, yychar, yyline, yytext());}

( campo_cod_servicio ) {return new Symbol(sym.campo_cod_servicio, yychar, yyline, yytext());}
( campo_cod_paquete ) {return new Symbol(sym.campo_cod_paquete, yychar, yyline, yytext());}
( campo_costo ) {return new Symbol(sym.campo_costo, yychar, yyline, yytext());}
( campo_password ) {return new Symbol(sym.campo_password, yychar, yyline, yytext());}
( campo_mail ) {return new Symbol(sym.campo_mail, yychar, yyline, yytext());}




/*campos reportes*/
( nombre ) {return new Symbol(sym.nombre, yychar, yyline, yytext());}

( descripcion ) {return new Symbol(sym.descripcion, yychar, yyline, yytext());}

( id ) {return new Symbol(sym.id, yychar, yyline, yytext());}




/*tablas */
( roles ) {return new Symbol(sym.roles, yychar, yyline, yytext());}
( usuarios ) {return new Symbol(sym.usuarios, yychar, yyline, yytext());}
( clientes) {return new Symbol(sym.clientes, yychar, yyline, yytext());}
( sucursales ) {return new Symbol(sym.sucursales, yychar, yyline, yytext());}
( items ) {return new Symbol(sym.items, yychar, yyline, yytext());}
( servicios ) {return new Symbol(sym.servicios, yychar, yyline, yytext());}
( paquetes ) {return new Symbol(sym.paquetes, yychar, yyline, yytext());}
( compras ) {return new Symbol(sym.compras, yychar, yyline, yytext());}
( comisiones ) {return new Symbol(sym.comisiones, yychar, yyline, yytext());}
( contratos ) {return new Symbol(sym.contratos, yychar, yyline, yytext());}
( pagos ) {return new Symbol(sym.pagos, yychar, yyline, yytext());}

( permisos ) {return new Symbol(sym.permisos, yychar, yyline, yytext());}


/* Comillas String */
("'") {return new Symbol(sym.Comita, yychar, yyline, yytext());}
("@") {return new Symbol(sym.Arroba, yychar, yyline, yytext());}
(".") {return new Symbol(sym.Punto, yychar, yyline, yytext());}



/*Numeros*/
{D}+ {return new Symbol(sym.Entero, yychar, yyline, yytext());}
({D}"."{D})+ {return new Symbol(sym.flotante, yychar, yyline, yytext());}

/*Operadores Booleanos*/
(false | true) {return new Symbol(sym.boleano, yychar, yyline, yytext());}

/* date*/
({D}(":"){D}(":"){D}+ |{D}("/"){D}("/"){D}+) {return new Symbol(sym.date, yychar, yyline, yytext());}


/* Parentesis de apertura */
( "(" ) {return new Symbol(sym.ParentesisA, yychar, yyline, yytext());}

/* Parentesis de cierre */
( ")" ) {return new Symbol(sym.ParentesisB, yychar, yyline, yytext());}


/* Corchetes de apertura */
( "[" ) {return new Symbol(sym.CorcheteA, yychar, yyline, yytext());}

/* Corchetes de cierre */
( "]" ) {return new Symbol(sym.CorcheteB, yychar, yyline, yytext());}



/* DOS PUNTOS*/
( ":" ) {return new Symbol(sym.dospuntos, yychar, yyline, yytext());}

/* Identificador */
{S} | {NS} {return new Symbol(sym.Identificador, yychar, yyline, yytext());}

/* Error de analisis */
 . {return new Symbol(sym.ERROR, yychar, yyline, yytext());}