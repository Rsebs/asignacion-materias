import{d as s,i as G,o as d,c as N,w as y,a as e,j as $,b as l,k as A,l as L,e as u,h as V,F as g,g as M,t as c}from"./app-1388f3ab.js";import{g as k}from"./functions-d178657d.js";import{_ as P}from"./AppLayout-b836c665.js";import{_ as n}from"./InputLabel-9b2c81da.js";import{_ as r}from"./TextInput-c855fb06.js";import{_ as j}from"./PrimaryButton-15a980c2.js";import{L as F}from"./Loading-8a3b9f5e.js";import"./ApplicationMark-8dba2d05.js";import"./_plugin-vue_export-helper-c27b6911.js";const I=e("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Página de Estudiantes EDITAR ",-1),R={class:"py-12"},z={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},H={class:"bg-white p-5 overflow-hidden shadow-xl sm:rounded-lg"},J=["onSubmit"],K=e("h1",{class:"text-red-700 text-3xl my-5 uppercase font-bold text-center"},"Editar estudiante",-1),O=["textContent","value"],Q={class:"table-auto border-collapse border border-slate-400 mt-2 w-full"},W=e("thead",null,[e("tr",null,[e("th",{class:"border border-slate-300"},"Curso"),e("th",{class:"border border-slate-300"},"Créditos"),e("th",{class:"border border-slate-300"},"Profesor")])],-1),X={key:0},Y={colspan:"3"},Z=["textContent"],ee=["textContent"],te={class:"border border-slate-300 grid grid-cols-3"},le={class:"flex justify-between items-center border-b-2 border-r-2 p-1"},oe=["for","textContent"],se=["checked","id","name"],fe={__name:"Edit",props:["student","coursesStudent"],setup(C){const{student:a,coursesStudent:ae}=C,E=s({}),U=s({}),p=s(a.document),v=s(a.names),f=s(a.last_names),_=s(a.phone),b=s(a.email),x=s(a.home_address),h=s(a.city_id),w=s(a.semester),S=s(!0);G(async()=>{await q(),await T(),S.value=!1});async function q(){const i=await k(route("cities.index"),"GET");E.value=i.data}async function T(){const i=await k(route("courses.index"),"GET");U.value=i.data}async function D(){const i={document:p.value,names:v.value,last_names:f.value,phone:_.value,email:b.value,home_address:x.value,city_id:parseInt(h.value),semester:w.value};k(route("students.update",a.id),"PUT",i),alert("Registro Guardado"),setTimeout(()=>{window.location.href=route("student.index")},2e3)}return(i,o)=>(d(),N(P,{title:"Estudiantes"},{header:y(()=>[I]),default:y(()=>[e("div",R,[e("div",z,[e("div",H,[e("form",{onSubmit:$(D,["prevent"])},[K,e("div",null,[l(n,{for:"document",value:"Documento"}),l(r,{modelValue:p.value,"onUpdate:modelValue":o[0]||(o[0]=t=>p.value=t),id:"document",type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"])]),e("div",null,[l(n,{for:"names",value:"Nombres"}),l(r,{modelValue:v.value,"onUpdate:modelValue":o[1]||(o[1]=t=>v.value=t),id:"names",type:"text",class:"mt-1 block w-full",required:"",autocomplete:"username"},null,8,["modelValue"])]),e("div",null,[l(n,{for:"last_names",value:"Apellidos"}),l(r,{modelValue:f.value,"onUpdate:modelValue":o[2]||(o[2]=t=>f.value=t),id:"last_names",type:"text",class:"mt-1 block w-full",required:"",autocomplete:"username"},null,8,["modelValue"])]),e("div",null,[l(n,{for:"phone",value:"Télefono"}),l(r,{modelValue:_.value,"onUpdate:modelValue":o[3]||(o[3]=t=>_.value=t),id:"phone",type:"tel",class:"mt-1 block w-full",required:"",autocomplete:"username"},null,8,["modelValue"])]),e("div",null,[l(n,{for:"email",value:"Email"}),l(r,{modelValue:b.value,"onUpdate:modelValue":o[4]||(o[4]=t=>b.value=t),id:"email",type:"email",class:"mt-1 block w-full",required:"",autocomplete:"username"},null,8,["modelValue"])]),e("div",null,[l(n,{for:"home_address",value:"Dirección"}),l(r,{modelValue:x.value,"onUpdate:modelValue":o[5]||(o[5]=t=>x.value=t),id:"home_address",type:"text",class:"mt-1 block w-full",required:"",autocomplete:"username"},null,8,["modelValue"])]),e("div",null,[l(n,{for:"city",value:"Ciudad"}),A(e("select",{"onUpdate:modelValue":o[6]||(o[6]=t=>h.value=t),class:"border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"},[(d(!0),u(g,null,V(E.value,t=>(d(),u("option",{textContent:c(t.name),value:t.id},null,8,O))),256))],512),[[L,h.value]])]),e("div",null,[l(n,{for:"semester",value:"Semestre"}),l(r,{modelValue:w.value,"onUpdate:modelValue":o[7]||(o[7]=t=>w.value=t),id:"semester",type:"number",class:"mt-1 block w-full",required:"",autocomplete:"username"},null,8,["modelValue"])]),e("div",null,[e("table",Q,[W,e("tbody",null,[S.value?(d(),u("tr",X,[e("td",Y,[l(F)])])):(d(!0),u(g,{key:1},V(U.value,t=>(d(),u("tr",null,[e("td",{textContent:c(t.name),class:"border border-slate-300 p-1 text-center"},null,8,Z),e("td",{textContent:c(t.credits),class:"border border-slate-300 p-1 text-center"},null,8,ee),e("td",te,[(d(!0),u(g,null,V(t.professors,m=>(d(),u("div",le,[e("label",{for:t.id+"-"+m.id,textContent:c(m.names+" "+m.last_names)},null,8,oe),e("input",{checked:C.coursesStudent.some(B=>B.id===t.id),type:"radio",id:t.id+"-"+m.id,name:t.id},null,8,se)]))),256))])]))),256))])])]),l(j,{class:"mt-4"},{default:y(()=>[M(" Guardar ")]),_:1})],40,J)])])])]),_:1}))}};export{fe as default};