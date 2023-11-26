import{_ as y}from"./AppLayout-b836c665.js";import{d as _,i as b,m as x,o as i,c as g,w as e,a as t,b as a,g as s,u as f,p as m,t as l,f as w,e as u,h as k,F as E}from"./app-1388f3ab.js";import{_ as N}from"./DangerButton-709c298b.js";import{_ as C}from"./PrimaryButton-15a980c2.js";import{_ as $}from"./SecondaryButton-7ebb8158.js";import{_ as D}from"./Alert-b46e35a8.js";import{L as A}from"./Loading-8a3b9f5e.js";import"./ApplicationMark-8dba2d05.js";import"./_plugin-vue_export-helper-c27b6911.js";const B=t("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Página de Asignaturas ",-1),L={class:"py-12"},V={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},S={class:"bg-white p-5 overflow-hidden shadow-xl sm:rounded-lg"},j=["textContent"],F={key:1},I={class:"my-4 flex justify-between gap-3"},R={class:"lg:grid grid-cols-3 items-center"},M={class:"font-bold mb-2"},P=["textContent"],T={class:"font-bold mb-2"},q=["textContent"],z={class:"font-bold mb-2"},G=["textContent"],H={class:"font-bold mb-2"},J=["textContent"],K={class:"font-bold mb-2 line-clamp-1"},O=["textContent"],Q={class:"font-bold mb-2"},U=["textContent"],W={class:"flex flex-col gap-2 justify-center items-center"},X=t("hr",null,null,-1),ct={__name:"Index",setup(Y){const h=_({}),c=_(!1),d=_("");b(async()=>{await p()});async function p(){try{c.value=!0;const o=await x.get(route("courses.index"));h.value=o.data}catch(o){console.error("Error al traer listado de cursos: ",o)}finally{c.value=!1}}async function v(o){if(confirm("¿Deseas Eliminar este registro?"))try{const r=await x({method:"delete",url:route("courses.destroy",o)});if(r.status===200){d.value=r.data.msg;return}}catch(r){console.error("Error al eliminar curso: ",r)}finally{await p()}}return(o,r)=>(i(),g(y,{title:"Asignaturas"},{header:e(()=>[B]),default:e(()=>[t("div",L,[t("div",V,[t("div",S,[a(f(m),{href:o.route("course.create")},{default:e(()=>[a(C,null,{default:e(()=>[s(" Agregar Asignaturas ")]),_:1})]),_:1},8,["href"]),d.value!==""?(i(),g(D,{key:0,type:"success",title:"Registro Eliminado",class:"my-4"},{default:e(()=>[t("p",{textContent:l(d.value)},null,8,j)]),_:1})):w("",!0),c.value?(i(),u("div",F,[a(A)])):(i(!0),u(E,{key:2},k(h.value,n=>(i(),u("div",null,[t("div",I,[t("div",R,[t("p",M,[s("Nombre: "),t("span",{textContent:l(n.name),class:"font-normal"},null,8,P)]),t("p",T,[s("Créditos: "),t("span",{textContent:l(n.credits),class:"font-normal"},null,8,q)]),t("p",z,[s("Área de Conocimiento: "),t("span",{textContent:l(n.knowledge_area),class:"font-normal"},null,8,G)]),t("p",H,[s("Electiva: "),t("span",{textContent:l(n.elective?"Si":"No"),class:"font-normal"},null,8,J)]),t("p",K,[s("description: "),t("span",{textContent:l(n.description),class:"font-normal"},null,8,O)]),t("p",Q,[s("Registro: "),t("span",{textContent:l(new Date(n.created_at).toLocaleDateString()),class:"font-normal"},null,8,U)])]),t("div",W,[a(f(m),{href:o.route("course.show",n.id)},{default:e(()=>[a(C,null,{default:e(()=>[s(" Informacíon ")]),_:1})]),_:2},1032,["href"]),a(f(m),{href:o.route("course.edit",n.id)},{default:e(()=>[a($,null,{default:e(()=>[s(" Editar ")]),_:1})]),_:2},1032,["href"]),a(N,{onClick:Z=>v(n.id)},{default:e(()=>[s(" Eliminar ")]),_:2},1032,["onClick"])])]),X]))),256))])])])]),_:1}))}};export{ct as default};