package analizadortecno.jcup.jcupprueba.prueba3;

import java_cup.runtime.Symbol;

parser code
{:
    private Symbol s;
    
    public void syntax_error(Symbol s){
        this.s = s;
    }

    public Symbol getS(){
        return this.s;
}
:};

terminal Linea, date,Comita,flotante,Entero,boleano, ERROR,ParentesisA,ParentesisB,CorcheteA,CorcheteB,Separador,dospuntos,Identificador,Arroba,Punto,
INSSUC,MODSUC,VERSUC,DELSUC,campo_nombre,campo_direccion,campo_descripcion,campo_telefono,
INSCLI,MODCLI,DELCLI,VERCLI,campo_apellidoP,campo_apellidoM,campo_tipo,campo_id, campo_persona_id,
INSITM,MODITM,DELITM,VERITM,campo_cod_item,campo_cantidad,campo_estado,campo_costo_unitario,campo_sucursal_id,
INSSRV,MODSRV,DELSRV,VERSRV,campo_cod_servicio,campo_costo,INSSRI,DELSRI,
INSUSR,MODUSR,DELUSR,VERUSR,campo_password,campo_mail,campo_rol,
INSROL,MODROL,DELROL,VERROL,
INSPAG,MODPAG,DELPAG,VERPAG,
INSPAQ,MODPAQ,DELPAQ,VERPAQ,INSPAS,DELPAS,campo_cod_paquete,
INSCPA,DELCPA,VERCPA,
MOVACT,VERCOM,VERCTT,MODCOM,MODCTT,VSRCTT,HELPS,REPEST,All,
roles,clientes,usuarios,sucursales,items,servicios,paquetes,compras,comisiones,contratos,pagos,permisos,
Igual,Mayor,Menor,MayorIgual,MenorIgual,Diferente,Contiene,BETWEEN,YY,OO,
campo_sucursal,campo_item,campo_servicio,campo_fecha,campo_fecha_entrega,campo_paquete,campo_pago,campo_compra_id,
campo_motivo,AND,
id,nombre,descripcion
;


non terminal INICIO, COMANDO, ACCIONINSSUC , ACCIONDELSUC , ACCIONMODSUC , ACCIONVERSUC ,ID,
ACCIONINSCLI, ACCIONDELCLI, ACCIONMODCLI, ACCIONVERCLI, VALOR_SUC , VALOR_CLI, ACCIONINSSUCC, COMASTRING, CORREO,
ACCIONINSITM, ACCIONMODITM, ACCIONDELITM, ACCIONVERITM ,VALOR_ITM,FLOTANTES,
ACCIONINSSRV, ACCIONMODSRV, ACCIONDELSRV, ACCIONVERSRV,VALOR_SRV,SERVICIOITEM,ACCIONINSSRI,ACCIONDELSRI,ITEM,IDENTIFICADORES,
ACCIONINSUSR, ACCIONMODUSR, ACCIONDELUSR, ACCIONVERUSR,VALOR_USR,
ACCIONINSROL, ACCIONMODROL, ACCIONDELROL, ACCIONVERROL,VALOR_ROL,
ACCIONINSPAG, ACCIONMODPAG, ACCIONDELPAG, ACCIONVERPAG,VALOR_PAG,
ACCIONINSPAQ, ACCIONMODPAQ, ACCIONDELPAQ, ACCIONVERPAQ, VALOR_PAQ, ACCIONINSPAS, ACCIONDELPAS,
ACCIONINSCPA, ACCIONDELCPA, ACCIONVERCPA,
ACCIONMOVACT, ACCIONVERCOM, ACCIONVERCTT,ACCIONMODCOM,ACCIONMODCTT,ACCIONVSRCTT, ACCIONHELPS,
ACCIONREPEST,REPORTEDINAMICO, TABLA, REPORTEPAGOS, ANDOR, REP_PAGOS, OPERADOR, OPERADORINT, BTWEN,
REPORTEPERMISOS,REP_PERMISOS
;

start with INICIO;

INICIO ::= 
  COMANDO  
;

COMANDO::=
INSSUC ACCIONINSSUC | INSSUC ACCIONINSSUCC | MODSUC ACCIONMODSUC | DELSUC ACCIONDELSUC | VERSUC ACCIONVERSUC | 
INSCLI ACCIONINSCLI | MODCLI ACCIONMODCLI | DELCLI ACCIONDELCLI | VERCLI ACCIONVERCLI |
INSITM ACCIONINSITM | MODITM ACCIONMODITM | DELITM ACCIONDELITM | VERITM ACCIONVERITM |
INSSRV ACCIONINSSRV | MODSRV ACCIONMODSRV | DELSRV ACCIONDELSRV | VERSRV ACCIONVERSRV | INSSRI ACCIONINSSRI | DELSRI ACCIONDELSRI |
INSUSR ACCIONINSUSR | MODUSR ACCIONMODUSR | DELUSR ACCIONDELUSR | VERUSR ACCIONVERUSR |
INSROL ACCIONINSROL | MODROL ACCIONMODROL | DELROL ACCIONDELROL | VERROL ACCIONVERROL |
INSPAG ACCIONINSPAG | MODPAG ACCIONMODPAG | DELPAG ACCIONDELPAG | VERPAG ACCIONVERPAG |
INSPAQ ACCIONINSPAQ | MODPAQ ACCIONMODPAQ | DELPAQ ACCIONDELPAQ | VERPAQ ACCIONVERPAQ | INSPAS ACCIONINSPAS | DELPAS ACCIONDELPAS |
INSCPA ACCIONINSCPA | DELCPA ACCIONDELCPA | VERCPA ACCIONVERCPA |
MOVACT ACCIONMOVACT | VERCOM ACCIONVERCOM | VERCTT ACCIONVERCTT | MODCOM ACCIONMODCOM | MODCTT ACCIONMODCTT |
VSRCTT ACCIONVSRCTT | HELPS ACCIONHELPS | REPEST ACCIONREPEST
;


ACCIONINSSUC::=
    ParentesisA COMASTRING Separador COMASTRING Separador COMASTRING Separador COMASTRING ParentesisB;
ACCIONINSSUCC::=
    ParentesisA CORREO ParentesisB ;
ACCIONDELSUC::=
    ParentesisA Entero ParentesisB ;
ACCIONMODSUC::=
    ParentesisA ID Separador VALOR_SUC ParentesisB | 
    ParentesisA ID Separador VALOR_SUC Separador VALOR_SUC ParentesisB | 
    ParentesisA ID Separador VALOR_SUC Separador VALOR_SUC Separador VALOR_SUC ParentesisB |
    ParentesisA ID Separador VALOR_SUC Separador VALOR_SUC Separador VALOR_SUC Separador VALOR_SUC ParentesisB;
ACCIONVERSUC::=
    ParentesisA Entero ParentesisB;

ACCIONINSCLI::=
    ParentesisA COMASTRING Separador COMASTRING Separador COMASTRING Separador COMASTRING Separador
     COMASTRING Separador Entero ParentesisB;
ACCIONDELCLI::=
    ParentesisA Entero ParentesisB;
ACCIONMODCLI::=
    ParentesisA ID Separador VALOR_CLI ParentesisB |
    ParentesisA ID Separador VALOR_CLI Separador VALOR_CLI ParentesisB | 
    ParentesisA ID Separador VALOR_CLI Separador VALOR_CLI Separador VALOR_CLI ParentesisB |
    ParentesisA ID Separador VALOR_CLI Separador VALOR_CLI Separador VALOR_CLI Separador VALOR_CLI ParentesisB |
    ParentesisA ID Separador VALOR_CLI Separador VALOR_CLI Separador VALOR_CLI Separador VALOR_CLI Separador VALOR_CLI ParentesisB |
    ParentesisA ID Separador VALOR_CLI Separador VALOR_CLI Separador VALOR_CLI Separador VALOR_CLI Separador VALOR_CLI Separador VALOR_CLI ParentesisB;
ACCIONVERCLI::=
    ParentesisA Entero ParentesisB;



ACCIONINSITM::=    
    ParentesisA COMASTRING Separador COMASTRING Separador COMASTRING Separador Entero Separador  Entero Separador  Entero Separador FLOTANTES Separador Entero ParentesisB;
ACCIONDELITM::=
    ParentesisA Entero ParentesisB;
ACCIONMODITM::=
    ParentesisA ID Separador VALOR_ITM ParentesisB | 
    ParentesisA ID Separador VALOR_ITM Separador VALOR_ITM ParentesisB | 
    ParentesisA ID Separador VALOR_ITM Separador VALOR_ITM Separador VALOR_ITM ParentesisB |
    ParentesisA ID Separador VALOR_ITM Separador VALOR_ITM Separador VALOR_ITM Separador VALOR_ITM ParentesisB |
    ParentesisA ID Separador VALOR_ITM Separador VALOR_ITM Separador VALOR_ITM Separador VALOR_ITM Separador VALOR_ITM ParentesisB |
    ParentesisA ID Separador VALOR_ITM Separador VALOR_ITM Separador VALOR_ITM Separador VALOR_ITM Separador VALOR_ITM Separador VALOR_ITM ParentesisB |
    ParentesisA ID Separador VALOR_ITM Separador VALOR_ITM Separador VALOR_ITM Separador VALOR_ITM Separador VALOR_ITM Separador VALOR_ITM Separador VALOR_ITM ParentesisB |
    ParentesisA ID Separador VALOR_ITM Separador VALOR_ITM Separador VALOR_ITM Separador VALOR_ITM Separador VALOR_ITM Separador VALOR_ITM Separador VALOR_ITM Separador VALOR_ITM ParentesisB
;
ACCIONVERITM::=
    ParentesisA Entero ParentesisB;


ACCIONINSSRV::=
    ParentesisA COMASTRING Separador COMASTRING Separador COMASTRING Separador FLOTANTES Separador SERVICIOITEM ParentesisB;
ACCIONINSSRI::=
    ParentesisA ID Separador SERVICIOITEM ParentesisB ;
ACCIONDELSRV::=
    ParentesisA Entero ParentesisB ;
ACCIONDELSRI::=
    ParentesisA ID Separador IDENTIFICADORES ParentesisB ;
ACCIONMODSRV::=
    ParentesisA ID Separador VALOR_SRV ParentesisB | 
    ParentesisA ID Separador VALOR_SRV Separador VALOR_SRV ParentesisB | 
    ParentesisA ID Separador VALOR_SRV Separador VALOR_SRV Separador VALOR_SRV ParentesisB |
    ParentesisA ID Separador VALOR_SRV Separador VALOR_SRV Separador VALOR_SRV Separador VALOR_SRV ParentesisB;
 ACCIONVERSRV::=
    ParentesisA Entero ParentesisB;




ACCIONINSUSR::=
    ParentesisA COMASTRING Separador COMASTRING Separador COMASTRING Separador COMASTRING Separador
     COMASTRING Separador CORREO Separador COMASTRING ParentesisB;
ACCIONDELUSR::=
    ParentesisA Entero ParentesisB;
ACCIONMODUSR::=
    ParentesisA ID Separador VALOR_USR ParentesisB |
    ParentesisA ID Separador VALOR_USR Separador VALOR_USR ParentesisB | 
    ParentesisA ID Separador VALOR_USR Separador VALOR_USR Separador VALOR_USR ParentesisB |
    ParentesisA ID Separador VALOR_USR Separador VALOR_USR Separador VALOR_USR Separador VALOR_USR ParentesisB |
    ParentesisA ID Separador VALOR_USR Separador VALOR_USR Separador VALOR_USR Separador VALOR_USR Separador VALOR_USR ParentesisB |
    ParentesisA ID Separador VALOR_USR Separador VALOR_USR Separador VALOR_USR Separador VALOR_USR Separador VALOR_USR Separador VALOR_USR ParentesisB |
    ParentesisA ID Separador VALOR_USR Separador VALOR_USR Separador VALOR_USR Separador VALOR_USR Separador VALOR_USR Separador VALOR_USR Separador VALOR_USR ParentesisB;

ACCIONVERUSR::=
    ParentesisA Entero ParentesisB;


ACCIONINSROL::=
    ParentesisA COMASTRING Separador COMASTRING ParentesisB;

ACCIONDELROL::=
    ParentesisA Entero ParentesisB ;
ACCIONMODROL::=
    ParentesisA ID Separador VALOR_ROL ParentesisB | 
    ParentesisA ID Separador VALOR_ROL Separador VALOR_ROL ParentesisB; 
ACCIONVERROL::=
    ParentesisA Entero ParentesisB;


ACCIONINSPAG::=
    ParentesisA COMASTRING Separador COMASTRING ParentesisB;

ACCIONDELPAG::=
    ParentesisA Entero ParentesisB ;
ACCIONMODPAG::=
    ParentesisA ID Separador VALOR_PAG ParentesisB | 
    ParentesisA ID Separador VALOR_PAG Separador VALOR_PAG ParentesisB; 
ACCIONVERPAG::=
    ParentesisA Entero ParentesisB;


ACCIONINSPAQ::=
    ParentesisA COMASTRING Separador COMASTRING Separador COMASTRING Separador FLOTANTES Separador IDENTIFICADORES ParentesisB;
 
ACCIONINSPAS::=
    ParentesisA ID Separador IDENTIFICADORES ParentesisB ;
ACCIONDELPAQ::=
    ParentesisA Entero ParentesisB ;
ACCIONDELPAS::=
    ParentesisA ID Separador IDENTIFICADORES ParentesisB ;
ACCIONMODPAQ::=
    ParentesisA ID Separador VALOR_PAQ ParentesisB | 
    ParentesisA ID Separador VALOR_PAQ Separador VALOR_PAQ ParentesisB | 
    ParentesisA ID Separador VALOR_PAQ Separador VALOR_PAQ Separador VALOR_PAQ ParentesisB |
    ParentesisA ID Separador VALOR_PAQ Separador VALOR_PAQ Separador VALOR_PAQ Separador VALOR_PAQ ParentesisB
;
   ACCIONVERPAQ::=
    ParentesisA Entero ParentesisB;

ACCIONINSCPA::=
    ParentesisA Entero Separador Identificador Separador Entero Separador date ParentesisB;
ACCIONDELCPA::=
    ParentesisA Entero ParentesisB ;
ACCIONVERCPA::=
    ParentesisA Entero ParentesisB;

ACCIONMOVACT::=
    ParentesisA ID Separador campo_sucursal_id dospuntos Entero ParentesisB;
ACCIONVERCOM::=
    ParentesisA Entero ParentesisB ;
ACCIONVERCTT::=
    ParentesisA Entero ParentesisB;
ACCIONMODCOM::=
    ParentesisA ID Separador Entero ParentesisB ;
ACCIONMODCTT::=
    ParentesisA ID Separador Entero ParentesisB;
ACCIONVSRCTT::=
    ParentesisA Entero ParentesisB;

ACCIONHELPS::=
    ParentesisA Identificador ParentesisB;


SERVICIOITEM::=
CorcheteA ITEM CorcheteB |
CorcheteA ITEM Separador ITEM CorcheteB |
CorcheteA ITEM Separador ITEM Separador ITEM CorcheteB |
CorcheteA ITEM Separador ITEM Separador ITEM Separador ITEM CorcheteB |
CorcheteA ITEM Separador ITEM Separador ITEM Separador ITEM Separador ITEM CorcheteB |
CorcheteA ITEM Separador ITEM Separador ITEM Separador ITEM Separador ITEM Separador ITEM CorcheteB |
CorcheteA ITEM Separador ITEM Separador ITEM Separador ITEM Separador ITEM Separador ITEM Separador ITEM CorcheteB |
CorcheteA ITEM Separador ITEM Separador ITEM Separador ITEM Separador ITEM Separador ITEM Separador ITEM Separador ITEM CorcheteB |
CorcheteA ITEM Separador ITEM Separador ITEM Separador ITEM Separador ITEM Separador ITEM Separador ITEM Separador ITEM Separador ITEM CorcheteB |
CorcheteA ITEM Separador ITEM Separador ITEM Separador ITEM Separador ITEM Separador ITEM Separador ITEM Separador ITEM Separador ITEM Separador ITEM CorcheteB
;
IDENTIFICADORES::=
CorcheteA Identificador CorcheteB |
CorcheteA Identificador Separador Identificador CorcheteB |
CorcheteA Identificador Separador Identificador Separador Identificador CorcheteB |
CorcheteA Identificador Separador Identificador Separador Identificador Separador Identificador CorcheteB |
CorcheteA Identificador Separador Identificador Separador Identificador Separador Identificador Separador Identificador CorcheteB |
CorcheteA Identificador Separador Identificador Separador Identificador Separador Identificador Separador Identificador Separador Identificador CorcheteB |
CorcheteA Identificador Separador Identificador Separador Identificador Separador Identificador Separador Identificador Separador Identificador Separador Identificador CorcheteB |
CorcheteA Identificador Separador Identificador Separador Identificador Separador Identificador Separador Identificador Separador Identificador Separador Identificador Separador Identificador CorcheteB |
CorcheteA Identificador Separador Identificador Separador Identificador Separador Identificador Separador Identificador Separador Identificador Separador Identificador Separador Identificador Separador Identificador CorcheteB |
CorcheteA Identificador Separador Identificador Separador Identificador Separador Identificador Separador Identificador Separador Identificador Separador Identificador Separador Identificador Separador Identificador Separador Identificador CorcheteB
;


ITEM::=
Identificador dospuntos Entero;

VALOR_SUC::=
 campo_nombre dospuntos COMASTRING |
 campo_direccion dospuntos COMASTRING |
 campo_descripcion dospuntos COMASTRING |
 campo_telefono dospuntos COMASTRING
;

VALOR_CLI::=
 campo_nombre dospuntos COMASTRING |
 campo_apellidoM dospuntos COMASTRING |
 campo_apellidoP dospuntos COMASTRING |
 campo_direccion dospuntos COMASTRING |
 campo_telefono dospuntos COMASTRING |
 campo_tipo dospuntos Entero
;


VALOR_ITM::=
 campo_cod_item dospuntos COMASTRING |
 campo_nombre dospuntos COMASTRING |
 campo_descripcion dospuntos COMASTRING |
 campo_cantidad dospuntos Entero |
 campo_tipo dospuntos Entero |
 campo_estado dospuntos Entero |
 campo_costo_unitario dospuntos flotante |
 campo_costo_unitario dospuntos Entero |
 campo_sucursal_id dospuntos Entero
;


VALOR_SRV::=
 campo_cod_servicio dospuntos COMASTRING |
 campo_nombre dospuntos COMASTRING |
 campo_descripcion dospuntos COMASTRING |
 campo_costo dospuntos flotante | 
 campo_costo dospuntos Entero 
;

VALOR_USR::=
 campo_nombre dospuntos COMASTRING |
 campo_apellidoM dospuntos COMASTRING |
 campo_apellidoP dospuntos COMASTRING |
 campo_direccion dospuntos COMASTRING |
 campo_password dospuntos COMASTRING |
 campo_mail dospuntos CORREO|
 campo_rol dospuntos COMASTRING 
;



VALOR_ROL::=
 campo_nombre dospuntos COMASTRING |
 campo_descripcion dospuntos COMASTRING
;
VALOR_PAG::=
 campo_nombre dospuntos COMASTRING |
 campo_descripcion dospuntos COMASTRING
;


VALOR_PAQ::=
 campo_cod_paquete dospuntos COMASTRING |
 campo_nombre dospuntos COMASTRING |
 campo_descripcion dospuntos COMASTRING |
 campo_costo dospuntos flotante | 
 campo_costo dospuntos Entero
;










ACCIONREPEST::=
    ParentesisA REPORTEDINAMICO  ParentesisB
;

REPORTEDINAMICO::=
 pagos Separador CorcheteA All CorcheteB |
 permisos Separador CorcheteA All CorcheteB |
 pagos Separador CorcheteA REPORTEPAGOS CorcheteB |
 permisos Separador CorcheteA REPORTEPERMISOS CorcheteB
;

REPORTEPAGOS::=
REP_PAGOS|
REP_PAGOS ANDOR REP_PAGOS |
REP_PAGOS ANDOR REP_PAGOS ANDOR REP_PAGOS 
;

REPORTEPERMISOS::=
REP_PERMISOS|
REP_PERMISOS ANDOR REP_PERMISOS |
REP_PERMISOS ANDOR REP_PERMISOS ANDOR REP_PERMISOS 
;


ANDOR::=
YY | OO
;
TABLA::=
roles|clientes|usuarios|sucursales|items|servicios|paquetes|compras|comisiones|contratos|pagos|permisos
;


REP_PAGOS::=
id OPERADORINT Entero   |
nombre OPERADOR COMASTRING |
descripcion OPERADOR COMASTRING  
;
REP_PERMISOS::=
id OPERADORINT Entero   |
nombre OPERADOR COMASTRING |
descripcion OPERADOR COMASTRING  
;

OPERADOR::=
Igual | Contiene | Diferente
;
OPERADORINT::=
Igual | Diferente | Mayor | MayorIgual | Menor | MenorIgual | BTWEN
;
BTWEN::=
BETWEEN COMASTRING AND COMASTRING |
BETWEEN Entero AND Entero |
BETWEEN flotante AND flotante
;


COMASTRING::=
Comita Identificador Comita |
Comita Entero Comita 
;

FLOTANTES::=
flotante | Entero
;

ID::=
campo_id dospuntos Entero
;

CORREO::=
Comita Identificador Arroba Identificador Punto Identificador  Comita |
Comita Identificador Arroba Identificador Punto Identificador Punto Identificador Comita
;