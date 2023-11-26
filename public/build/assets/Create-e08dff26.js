import{d as i,i as h,o as x,c as w,w as m,a as e,j as k,b as a,k as v,v as b,l as V,g as y}from"./app-1388f3ab.js";import{g as C}from"./functions-d178657d.js";import{_ as A}from"./AppLayout-b836c665.js";import{_ as l}from"./InputLabel-9b2c81da.js";import{_}from"./TextInput-c855fb06.js";import{_ as M}from"./PrimaryButton-15a980c2.js";import"./ApplicationMark-8dba2d05.js";import"./_plugin-vue_export-helper-c27b6911.js";const N=e("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Página de asignaturas CREAR ",-1),P={class:"py-12"},S={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},T={class:"bg-white p-5 overflow-hidden shadow-xl sm:rounded-lg"},U=["onSubmit"],$=e("h1",{class:"text-red-700 text-3xl my-5 uppercase font-bold text-center"},"Agregar Asignatura",-1),B=e("option",{value:"Ciencias"},"Ciencias",-1),R=e("option",{value:"Programación"},"Programación",-1),q=e("option",{value:"Artes"},"Artes",-1),D=e("option",{value:"Historia"},"Historia",-1),E=e("option",{value:"Matemáticas"},"Matemáticas",-1),G=[B,R,q,D,E],Q={__name:"Create",setup(H){const p=i(null),n=i(""),r=i(""),d=i(""),u=i("");let c;h(()=>{c=p.value});function f(s){c=s.target}async function g(){const s={name:n.value,description:r.value,credits:d.value,elective:c.checked,knowledge_area:u.value};await C(route("courses.store"),"POST",s),alert("Registro Guardado"),setTimeout(()=>{window.location.href=route("course.index")},2e3)}return(s,o)=>(x(),w(A,{title:"Asignaturas"},{header:m(()=>[N]),default:m(()=>[e("div",P,[e("div",S,[e("div",T,[e("form",{onSubmit:k(g,["prevent"]),action:"#"},[$,e("div",null,[a(l,{for:"name",value:"Nombre"}),a(_,{modelValue:n.value,"onUpdate:modelValue":o[0]||(o[0]=t=>n.value=t),id:"name",type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"])]),e("div",null,[a(l,{for:"description",value:"Descripción"}),v(e("textarea",{"onUpdate:modelValue":o[1]||(o[1]=t=>r.value=t),id:"description",class:"border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"},null,512),[[b,r.value]])]),e("div",null,[a(l,{for:"credits",value:"Créditos"}),a(_,{modelValue:d.value,"onUpdate:modelValue":o[2]||(o[2]=t=>d.value=t),id:"credits",type:"number",min:"1",max:"9",class:"mt-1 block w-full",required:"",autocomplete:"username"},null,8,["modelValue"])]),e("div",null,[a(l,{for:"elective",value:"Electiva"}),e("input",{onChange:o[3]||(o[3]=t=>f(t)),ref_key:"inputCheck",ref:p,type:"checkbox",class:"mt-1 block"},null,544)]),e("div",null,[a(l,{for:"knowledge_area",value:"Área de conocimiento"}),v(e("select",{"onUpdate:modelValue":o[4]||(o[4]=t=>u.value=t),id:"knowledge_area",class:"border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"},G,512),[[V,u.value]])]),a(M,{class:"mt-4"},{default:m(()=>[y(" Guardar ")]),_:1})],40,U)])])])]),_:1}))}};export{Q as default};