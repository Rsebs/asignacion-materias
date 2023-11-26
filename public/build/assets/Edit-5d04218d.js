import{d as l,i as w,o as k,c as b,w as p,a as e,j as V,b as a,k as _,v as y,l as A,g as C}from"./app-1388f3ab.js";import{g as M}from"./functions-d178657d.js";import{_ as T}from"./AppLayout-b836c665.js";import{_ as n}from"./InputLabel-9b2c81da.js";import{_ as f}from"./TextInput-c855fb06.js";import{_ as U}from"./PrimaryButton-15a980c2.js";import"./ApplicationMark-8dba2d05.js";import"./_plugin-vue_export-helper-c27b6911.js";const N=e("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Página de Asignaturas EDITAR ",-1),P={class:"py-12"},$={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},B={class:"bg-white p-5 overflow-hidden shadow-xl sm:rounded-lg"},D=["onSubmit"],E=e("h1",{class:"text-red-700 text-3xl my-5 uppercase font-bold text-center"},"Agregar Asignatura",-1),S=e("option",{value:"Ciencias"},"Ciencias",-1),q=e("option",{value:"Programación"},"Programación",-1),G=e("option",{value:"Artes"},"Artes",-1),H=e("option",{value:"Historia"},"Historia",-1),R=e("option",{value:"Matemáticas"},"Matemáticas",-1),j=[S,q,G,H,R],W={__name:"Edit",props:["course"],setup(g){const{course:s}=g,v=l(""),r=l(s.name),d=l(s.description),u=l(s.credits),c=l(s.knowledge_area);let m;w(()=>{m=v.value});function h(i){m=i.target}async function x(){const i={name:r.value,description:d.value,credits:u.value,elective:m.checked,knowledge_area:c.value};M(route("courses.update",s.id),"PUT",i),alert("Registro Guardado"),setTimeout(()=>{window.location.href=route("course.index")},2e3)}return(i,o)=>(k(),b(T,{title:"Asignaturas"},{header:p(()=>[N]),default:p(()=>[e("div",P,[e("div",$,[e("div",B,[e("form",{onSubmit:V(x,["prevent"]),action:"#"},[E,e("div",null,[a(n,{for:"name",value:"Nombre"}),a(f,{modelValue:r.value,"onUpdate:modelValue":o[0]||(o[0]=t=>r.value=t),id:"name",type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"])]),e("div",null,[a(n,{for:"description",value:"Descripción"}),_(e("textarea",{"onUpdate:modelValue":o[1]||(o[1]=t=>d.value=t),id:"description",class:"border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"},null,512),[[y,d.value]])]),e("div",null,[a(n,{for:"credits",value:"Créditos"}),a(f,{modelValue:u.value,"onUpdate:modelValue":o[2]||(o[2]=t=>u.value=t),id:"credits",type:"number",min:"1",max:"9",class:"mt-1 block w-full",required:"",autocomplete:"username"},null,8,["modelValue"])]),e("div",null,[a(n,{for:"elective",value:"Electiva"}),e("input",{onChange:o[3]||(o[3]=t=>h(t)),ref_key:"inputCheck",ref:v,type:"checkbox",class:"mt-1 block"},null,544)]),e("div",null,[a(n,{for:"knowledge_area",value:"Área de conocimiento"}),_(e("select",{"onUpdate:modelValue":o[4]||(o[4]=t=>c.value=t),id:"knowledge_area",class:"border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"},j,512),[[A,c.value]])]),a(U,{class:"mt-4"},{default:p(()=>[C(" Guardar ")]),_:1})],40,D)])])])]),_:1}))}};export{W as default};