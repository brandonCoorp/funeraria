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
id,nombre,descripcion,apellidoP,apellidoM,direccion,telefono,tipo,cod_item,cantidad,
estado,costo_unitario,sucursal_id,persona_id,sucursal,item,servicio,fecha,fecha_entrega,paquete,pago,compra_id,
motivo,rol,cod_servicio,cod_paquete,costo,mail
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
ACCIONREPEST, TABLA, REPORTEDINAMICO, REPORTEPAGOS, REPORTECLIENTES, REPORTEUSUARIOS, REPORTESUCURSALES,
REPORTEITEMS, REPORTESERVICIOS, REPORTEPAQUETES, REPORTECOMPRAS, REPORTECOMISIONES, REPORTECONTRATOS,
REPORTEPERMISOS, REPORTEROLES, ANDOR, REP_PERMISOS, REP_PAGOS, REP_ROLES, REP_CLIENTES, REP_USUARIOS, REP_SUCURSALES,
REP_ITEMS, REP_SERVICIOS, REP_PAQUETES, REP_COMPRAS, REP_COMISION,REP_CONTRATOS, OPERADOR, OPERADORINT, BTWEN
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
ACCIONREPEST::=
    ParentesisA TABLA Separador REPORTEDINAMICO  ParentesisB
;


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











REPORTEDINAMICO::=
 CorcheteA All CorcheteB |
CorcheteA REPORTEPAGOS CorcheteB |
CorcheteA REPORTECLIENTES CorcheteB |
CorcheteA REPORTEUSUARIOS CorcheteB |
CorcheteA REPORTESUCURSALES CorcheteB |
CorcheteA REPORTEITEMS CorcheteB |
CorcheteA REPORTESERVICIOS CorcheteB |
CorcheteA REPORTEPAQUETES CorcheteB |
CorcheteA REPORTECOMPRAS CorcheteB |
CorcheteA REPORTECOMISIONES CorcheteB |
CorcheteA REPORTECONTRATOS CorcheteB |
CorcheteA REPORTEPERMISOS CorcheteB |
CorcheteA REPORTEROLES CorcheteB
;

REPORTEPAGOS::=
REP_PAGOS|
REP_PAGOS ANDOR REP_PAGOS |
REP_PAGOS ANDOR REP_PAGOS ANDOR REP_PAGOS 
;
REPORTECLIENTES::=
REP_CLIENTES|
REP_CLIENTES ANDOR REP_CLIENTES |
REP_CLIENTES ANDOR REP_CLIENTES ANDOR REP_CLIENTES |
REP_CLIENTES ANDOR REP_CLIENTES ANDOR REP_CLIENTES ANDOR REP_CLIENTES |
REP_CLIENTES ANDOR REP_CLIENTES ANDOR REP_CLIENTES ANDOR REP_CLIENTES ANDOR REP_CLIENTES |
REP_CLIENTES ANDOR REP_CLIENTES ANDOR REP_CLIENTES ANDOR REP_CLIENTES ANDOR REP_CLIENTES ANDOR REP_CLIENTES|
REP_CLIENTES ANDOR REP_CLIENTES ANDOR REP_CLIENTES ANDOR REP_CLIENTES ANDOR REP_CLIENTES ANDOR REP_CLIENTES ANDOR REP_CLIENTES
;
REPORTEUSUARIOS::=
REP_USUARIOS|
REP_USUARIOS ANDOR REP_USUARIOS |
REP_USUARIOS ANDOR REP_USUARIOS ANDOR REP_USUARIOS |
REP_USUARIOS ANDOR REP_USUARIOS ANDOR REP_USUARIOS ANDOR REP_USUARIOS |
REP_USUARIOS ANDOR REP_USUARIOS ANDOR REP_USUARIOS ANDOR REP_USUARIOS ANDOR REP_USUARIOS |
REP_USUARIOS ANDOR REP_USUARIOS ANDOR REP_USUARIOS ANDOR REP_USUARIOS ANDOR REP_USUARIOS ANDOR REP_USUARIOS|
REP_USUARIOS ANDOR REP_USUARIOS ANDOR REP_USUARIOS ANDOR REP_USUARIOS ANDOR REP_USUARIOS ANDOR REP_USUARIOS ANDOR REP_USUARIOS
;
REPORTESUCURSALES::=
REP_SUCURSALES|
REP_SUCURSALES ANDOR REP_SUCURSALES |
REP_SUCURSALES ANDOR REP_SUCURSALES ANDOR REP_SUCURSALES |
REP_SUCURSALES ANDOR REP_SUCURSALES ANDOR REP_SUCURSALES ANDOR REP_SUCURSALES |
REP_SUCURSALES ANDOR REP_SUCURSALES ANDOR REP_SUCURSALES ANDOR REP_SUCURSALES ANDOR REP_SUCURSALES
;

REPORTEITEMS::=
REP_ITEMS|
REP_ITEMS ANDOR REP_ITEMS |
REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS |
REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS |
REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS |
REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS|
REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS |
REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS  |
REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS ANDOR REP_ITEMS
;
REPORTESERVICIOS::=
REP_SERVICIOS|
REP_SERVICIOS ANDOR REP_SERVICIOS |
REP_SERVICIOS ANDOR REP_SERVICIOS ANDOR REP_SERVICIOS |
REP_SERVICIOS ANDOR REP_SERVICIOS ANDOR REP_SERVICIOS ANDOR REP_SERVICIOS |
REP_SERVICIOS ANDOR REP_SERVICIOS ANDOR REP_SERVICIOS ANDOR REP_SERVICIOS ANDOR REP_SERVICIOS |
REP_SERVICIOS ANDOR REP_SERVICIOS ANDOR REP_SERVICIOS ANDOR REP_SERVICIOS ANDOR REP_SERVICIOS ANDOR REP_SERVICIOS|
REP_SERVICIOS ANDOR REP_SERVICIOS ANDOR REP_SERVICIOS ANDOR REP_SERVICIOS ANDOR REP_SERVICIOS ANDOR REP_SERVICIOS ANDOR REP_SERVICIOS
;

REPORTEPAQUETES::=
REP_PAQUETES|
REP_PAQUETES ANDOR REP_PAQUETES |
REP_PAQUETES ANDOR REP_PAQUETES ANDOR REP_PAQUETES |
REP_PAQUETES ANDOR REP_PAQUETES ANDOR REP_PAQUETES ANDOR REP_PAQUETES |
REP_PAQUETES ANDOR REP_PAQUETES ANDOR REP_PAQUETES ANDOR REP_PAQUETES ANDOR REP_PAQUETES |
REP_PAQUETES ANDOR REP_PAQUETES ANDOR REP_PAQUETES ANDOR REP_PAQUETES ANDOR REP_PAQUETES ANDOR REP_PAQUETES|
REP_PAQUETES ANDOR REP_PAQUETES ANDOR REP_PAQUETES ANDOR REP_PAQUETES ANDOR REP_PAQUETES ANDOR REP_PAQUETES ANDOR REP_PAQUETES
;
REPORTECOMPRAS::=
REP_COMPRAS|
REP_COMPRAS ANDOR REP_COMPRAS |
REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS |
REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS |
REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS |
REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS|
REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS |
REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS  |
REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS |
REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS ANDOR REP_COMPRAS
;
REPORTECOMISIONES::=
REP_COMISION|
REP_COMISION ANDOR REP_COMISION |
REP_COMISION ANDOR REP_COMISION ANDOR REP_COMISION |
REP_COMISION ANDOR REP_COMISION ANDOR REP_COMISION ANDOR REP_COMISION |
REP_COMISION ANDOR REP_COMISION ANDOR REP_COMISION ANDOR REP_COMISION ANDOR REP_COMISION
;
REPORTECONTRATOS::=
REP_CONTRATOS|
REP_CONTRATOS ANDOR REP_CONTRATOS |
REP_CONTRATOS ANDOR REP_CONTRATOS ANDOR REP_CONTRATOS |
REP_CONTRATOS ANDOR REP_CONTRATOS ANDOR REP_CONTRATOS ANDOR REP_CONTRATOS |
REP_CONTRATOS ANDOR REP_CONTRATOS ANDOR REP_CONTRATOS ANDOR REP_CONTRATOS ANDOR REP_CONTRATOS |
REP_CONTRATOS ANDOR REP_CONTRATOS ANDOR REP_CONTRATOS ANDOR REP_CONTRATOS ANDOR REP_CONTRATOS ANDOR REP_CONTRATOS|
REP_CONTRATOS ANDOR REP_CONTRATOS ANDOR REP_CONTRATOS ANDOR REP_CONTRATOS ANDOR REP_CONTRATOS ANDOR REP_CONTRATOS ANDOR REP_CONTRATOS |
REP_CONTRATOS ANDOR REP_CONTRATOS ANDOR REP_CONTRATOS ANDOR REP_CONTRATOS ANDOR REP_CONTRATOS ANDOR REP_CONTRATOS ANDOR REP_CONTRATOS ANDOR REP_CONTRATOS
;
REPORTEPERMISOS::=
REP_PERMISOS|
REP_PERMISOS ANDOR REP_PERMISOS |
REP_PERMISOS ANDOR REP_PERMISOS ANDOR REP_PERMISOS 
;
REPORTEROLES::=
REP_ROLES|
REP_ROLES ANDOR REP_ROLES |
REP_ROLES ANDOR REP_ROLES ANDOR REP_ROLES 
;

ANDOR::=
YY | OO
;
TABLA::=
roles|clientes|usuarios|sucursales|items|servicios|paquetes|compras|comisiones|contratos|pagos|permisos
;



REP_PERMISOS::=
id OPERADORINT Entero   |
nombre OPERADOR COMASTRING |
descripcion OPERADOR COMASTRING  
;

REP_ROLES::=
id OPERADORINT Entero   |
nombre OPERADOR COMASTRING |
descripcion OPERADOR COMASTRING  
;
REP_PAGOS::=
id OPERADORINT Entero   |
nombre OPERADOR COMASTRING |
descripcion OPERADOR COMASTRING  
;
REP_CLIENTES::=
id OPERADORINT Entero   |
nombre OPERADOR COMASTRING |
apellidoM OPERADOR COMASTRING |
apellidoP OPERADOR COMASTRING |
direccion OPERADOR COMASTRING |
telefono OPERADOR COMASTRING |
tipo OPERADORINT Entero
;
REP_USUARIOS::=
id OPERADORINT Entero   |
nombre OPERADOR COMASTRING |
apellidoM OPERADOR COMASTRING |
apellidoP OPERADOR COMASTRING |
direccion OPERADOR COMASTRING |
mail OPERADOR CORREO|
rol OPERADOR COMASTRING 
;
REP_SUCURSALES::=
id OPERADORINT Entero   |
nombre OPERADOR COMASTRING |
direccion OPERADOR COMASTRING |
descripcion OPERADOR COMASTRING |
telefono OPERADOR COMASTRING
;

REP_ITEMS::=
id OPERADORINT Entero   |
cod_item OPERADOR COMASTRING |
nombre OPERADOR COMASTRING |
descripcion OPERADOR COMASTRING |
cantidad OPERADORINT Entero |
tipo OPERADORINT Entero |
estado OPERADORINT Entero |
costo_unitario OPERADORINT dospuntos flotante |
costo_unitario OPERADORINT dospuntos Entero |
sucursal OPERADOR COMASTRING
;
REP_SERVICIOS::=
id OPERADORINT Entero   | 
cod_servicio OPERADOR COMASTRING |
nombre OPERADOR COMASTRING |
descripcion OPERADOR COMASTRING |
costo OPERADORINT flotante | 
costo OPERADORINT Entero |
item OPERADOR COMASTRING   |
cod_item OPERADOR COMASTRING 
;
REP_PAQUETES::=
id OPERADORINT Entero   | 
cod_paquete OPERADOR COMASTRING |
nombre OPERADOR COMASTRING |
descripcion OPERADOR COMASTRING |
costo OPERADORINT flotante | 
costo OPERADORINT Entero |
servicio OPERADOR COMASTRING   |
cod_servicio OPERADOR COMASTRING 
;

REP_COMPRAS::=
id OPERADORINT Entero   |
nombre OPERADOR COMASTRING |
apellidoM OPERADOR COMASTRING |
apellidoP OPERADOR COMASTRING |
fecha OPERADORINT date |
fecha_entrega OPERADORINT date|
costo OPERADORINT flotante | 
costo OPERADORINT Entero |
cod_paquete OPERADOR COMASTRING |
paquete OPERADOR COMASTRING|
pago OPERADOR COMASTRING 
;
REP_COMISION::=
id OPERADORINT Entero   |
mail OPERADOR CORREO|
estado OPERADORINT Entero |
costo OPERADORINT flotante | 
costo OPERADORINT Entero |
compra_id OPERADORINT Entero 
;
REP_CONTRATOS::=
id OPERADORINT Entero   |
nombre OPERADOR COMASTRING |
apellidoM OPERADOR COMASTRING |
apellidoP OPERADOR COMASTRING |
motivo OPERADOR COMASTRING|
estado OPERADORINT Entero |
costo OPERADORINT flotante | 
costo OPERADORINT Entero |
compra_id OPERADORINT Entero 
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