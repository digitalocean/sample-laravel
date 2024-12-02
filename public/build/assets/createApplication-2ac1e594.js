import{W as y,j as e,d as j,a as b}from"./app-8d2b419d.js";import{S as v}from"./StudentAuthLayout-8a6c82a5.js";import{A as i,C as r}from"./ChevronUpIcon-50caad8f.js";import"./transition-ffe475d1.js";import"./dialog-607f8680.js";import"./use-owner-e8bbfa71.js";import"./keyboard-55d2b3bd.js";import"./active-element-history-0d655bb6.js";import"./hidden-6b65874b.js";import"./use-resolve-button-type-81844bc5.js";function V({auth:d,application:n}){const{data:l,setData:a,post:m,processing:N,errors:_,reset:w}=y({name:"",email:"",streetAddress:"",city:"",state:"",zipCode:"",siblings:"",siblings_attending_college:"",college_choice:"",college_major:"",college_status:"",college_choice2:"",college_major2:"",college_status2:"",college_choice3:"",college_major3:"",college_status3:"",sat_score:"",sat_scheduled:"",act_score:"",act_scheduled:"",reference:"",reference_email:"",reference_relationsship:"",reference2:"",reference_email2:"",reference_relationsship2:"",application_essay:"",community_service:""}),o=c=>{c.preventDefault(),m(route("scholar.application.create"))};return e.jsxs(v,{user:d.user,header:e.jsx("h2",{className:"font-semibold text-xl text-gray-800 leading-tight",children:"Application"}),breadcrumb:e.jsx("span",{children:e.jsx(j,{href:route("scholar.dashboard"),children:"Application"})}),children:[e.jsx(b,{title:"Application"}),e.jsx("div",{className:"w-full px-6 py-6 mx-auto",children:e.jsx("div",{className:"flex flex-wrap -mx-1",children:e.jsx("form",{onSubmit:o,children:e.jsx("div",{className:"space-y-12",children:n==null?void 0:n.map(({id:c,name:g,email:x,streetAddress:u,zipCode:h,city:p,state:f})=>e.jsxs(e.Fragment,{children:[e.jsxs("div",{className:"grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 md:grid-cols-3",children:[e.jsxs("div",{children:[e.jsx("h2",{className:"text-base font-semibold leading-7 text-gray-900",children:"Personal Information"}),e.jsxs("p",{className:"mt-1 text-sm leading-6 text-gray-600",children:["Use a permanent address where you can receive mail. ",e.jsx("br",{}),"This information will only be shared with Blacks Scholars personnel and Selection Committee"]})]}),e.jsxs("div",{className:"grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2",children:[e.jsxs("div",{className:"sm:col-span-3",children:[e.jsx("label",{htmlFor:"name",className:"block text-sm font-medium leading-6 text-gray-900",children:"Full name"}),e.jsx("div",{className:"mt-2",children:e.jsx("input",{type:"text",name:"name",id:"name",value:l.name,autoComplete:"name",onChange:s=>a("name",s.target.value),placeholder:g,className:"block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"})})]}),e.jsxs("div",{className:"sm:col-span-4",children:[e.jsx("label",{htmlFor:"email",className:"block text-sm font-medium leading-6 text-gray-900",children:"Email address"}),e.jsx("div",{className:"mt-2",children:e.jsx("input",{id:"email",name:"email",type:"text",value:l.email,autoComplete:"email",placeholder:x,className:"block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"})})]}),e.jsxs("div",{className:"col-span-full",children:[e.jsx("label",{htmlFor:"streetAddress",className:"block text-sm font-medium leading-6 text-gray-900",children:"Street address"}),e.jsx("div",{className:"mt-2",children:e.jsx("input",{type:"text",name:"streetAddress",value:l.streetAddress,id:"streetAddress",autoComplete:"streetAddress",onChange:s=>a("streetAddress",s.target.value),placeholder:u,className:"block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"})})]}),e.jsxs("div",{className:"sm:col-span-2 sm:col-start-1",children:[e.jsx("label",{htmlFor:"city",className:"block text-sm font-medium leading-6 text-gray-900",children:"City"}),e.jsx("div",{className:"mt-2",children:e.jsx("input",{type:"text",name:"city",value:l.city,id:"city",autoComplete:"address-level2",onChange:s=>a("city",s.target.value),placeholder:p,className:"block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"})})]}),e.jsxs("div",{className:"sm:col-span-2",children:[e.jsx("label",{htmlFor:"state",className:"block text-sm font-medium leading-6 text-gray-900",children:"State / Province"}),e.jsx("div",{className:"mt-2",children:e.jsx("input",{type:"text",name:"state",value:l.state,id:"state",autoComplete:"address-level1",onChange:s=>a("state",s.target.value),placeholder:f,className:"block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"})})]}),e.jsxs("div",{className:"sm:col-span-2",children:[e.jsx("label",{htmlFor:"zipCode",className:"block text-sm font-medium leading-6 text-gray-900",children:"ZIP / Postal code"}),e.jsx("div",{className:"mt-2",children:e.jsx("input",{type:"text",name:"zipCode",value:l.zipCode,id:"zipCode",autoComplete:"zipCode",onChange:s=>a("zipCode",s.target.value),placeholder:h,className:"block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"})})]}),e.jsxs("div",{className:"sm:col-span-3",children:[e.jsx("label",{htmlFor:"siblings",className:"block text-sm font-medium leading-6 text-gray-900",children:"Any Siblings"}),e.jsx("div",{className:"mt-2",children:e.jsx("input",{type:"text",name:"siblings",value:l.siblings,id:"siblings",autoComplete:"siblings",onChange:s=>a("siblings",s.target.value),className:"block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"})})]}),e.jsxs("div",{className:"sm:col-span-3",children:[e.jsx("label",{htmlFor:"siblings_attending_college",className:"block text-sm font-medium leading-6 text-gray-900",children:"Number of Siblings Attending College?"}),e.jsx("div",{className:"mt-2",children:e.jsx("input",{type:"text",name:"siblings_attending_college",value:l.siblings_attending_college,id:"siblings_attending_college",onChange:s=>a("siblings_attending_college",s.target.value),className:"block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"})})]})]})]},c),e.jsxs("div",{className:"grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 md:grid-cols-3",children:[e.jsxs("div",{children:[e.jsx("h2",{className:"text-base font-semibold leading-7 text-gray-900",children:"College Choices & SAT Scores"}),e.jsx("p",{className:"mt-1 text-sm leading-6 text-gray-600",children:"Lets input your education level and or college choice"})]}),e.jsxs("div",{className:"max-w-2xl p-2 col-span-2",children:[e.jsx(i,{children:({open:s})=>e.jsxs(e.Fragment,{children:[e.jsxs(i.Button,{className:"flex w-full justify-between rounded-lg bg-red-100 px-4 py-2 text-left text-md font-medium text-gray-900 hover:bg-red-200 focus:outline-none focus-visible:ring focus-visible:ring-red-300/75",children:[e.jsx("span",{children:"First college choice"}),e.jsx(r,{className:`${s?"rotate-180 transform":""} h-5 w-5 text-purple-500`})]}),e.jsx(i.Panel,{className:"px-4 pb-2 pt-4 text-sm text-gray-500",children:e.jsxs("div",{className:"grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2",children:[e.jsxs("div",{className:"col-span-3",children:[e.jsx("label",{htmlFor:"college_choice",className:"block text-sm font-medium leading-6 text-gray-900",children:"College Name"}),e.jsx("div",{className:"mt-2",children:e.jsx("input",{type:"text",name:"college_choice",id:"college_choice",value:l.college_choice,autoComplete:"given-name",onChange:t=>a("college_choice",t.target.value),className:"block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"})})]}),e.jsxs("div",{className:"col-span-3",children:[e.jsx("label",{htmlFor:"college_major",className:"block text-sm font-medium leading-6 text-gray-900",children:"College Major"}),e.jsx("div",{className:"mt-2",children:e.jsx("input",{type:"text",name:"college_major",value:l.college_major,id:"college_major",onChange:t=>a("college_major",t.target.value),className:"block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"})})]}),e.jsxs("div",{className:"col-span-6",children:[e.jsx("label",{htmlFor:"college_status",className:"block text-sm font-medium leading-6 text-gray-900",children:"Current Admission Status"}),e.jsxs("select",{id:"college_status",name:"college_status",value:l.college_status,onChange:t=>a("college_status",t.target.value),className:"mt-2 block w-full h-10 rounded-md border-0 py-4 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6",defaultValue:"pending",children:[e.jsx("option",{value:"Not Started",children:"Not Started"}),e.jsx("option",{value:"Pending",children:"Pending"}),e.jsx("option",{value:"Accepted",children:"Accepted"}),e.jsx("option",{value:"Decline",children:"Decline"})]})]})]})})]})}),e.jsx(i,{as:"div",className:"mt-2",children:({open:s})=>e.jsxs(e.Fragment,{children:[e.jsxs(i.Button,{className:"flex w-full justify-between rounded-lg bg-red-100 px-4 py-2 text-left text-md font-medium text-gray-900 hover:bg-red-200 focus:outline-none focus-visible:ring focus-visible:ring-red-300/75",children:[e.jsx("span",{children:"Second college choice"}),e.jsx(r,{className:`${s?"rotate-180 transform":""} h-5 w-5 text-slate-700`})]}),e.jsx(i.Panel,{className:"px-4 pb-2 pt-4 text-sm text-slate-800",children:e.jsxs("div",{className:"grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2",children:[e.jsxs("div",{className:"col-span-3",children:[e.jsx("label",{htmlFor:"colege_choice2",className:"block text-sm font-medium leading-6 text-gray-900",children:"College Name"}),e.jsx("div",{className:"mt-2",children:e.jsx("input",{type:"text",name:"college_choice2",id:"colege_choice2",value:l.college_choice2,onChange:t=>a("college_choice2",t.target.value),autoComplete:"given-name",className:"block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"})})]}),e.jsxs("div",{className:"col-span-3",children:[e.jsx("label",{htmlFor:"college_major2",className:"block text-sm font-medium leading-6 text-gray-900",children:"College Major"}),e.jsx("div",{className:"mt-2",children:e.jsx("input",{type:"text",name:"college_major2",id:"college_major2",value:l.college_major2,onChange:t=>a("college_major2",t.target.value),autoComplete:"given-name",className:"block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"})})]}),e.jsxs("div",{className:"col-span-6",children:[e.jsx("label",{htmlFor:"college_status2",className:"block text-sm font-medium leading-6 text-gray-900",children:"Current Admission Status"}),e.jsxs("select",{id:"college_status2",name:"college_status2",value:l.college_status2,onChange:t=>a("college_status2",t.target.value),className:"h-10 mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6",defaultValue:"Canada",children:[e.jsx("option",{value:"Not Started",children:"Not Started"}),e.jsx("option",{value:"Pending",children:"Pending"}),e.jsx("option",{value:"Accepted",children:"Accepted"}),e.jsx("option",{value:"Decline",children:"Decline"})]})]})]})})]})}),e.jsx(i,{as:"div",className:"mt-2",children:({open:s})=>e.jsxs(e.Fragment,{children:[e.jsxs(i.Button,{className:"flex w-full justify-between rounded-lg bg-red-100 px-4 py-2 text-left text-md font-medium text-gray-900 hover:bg-red-200 focus:outline-none focus-visible:ring focus-visible:ring-red-300/75",children:[e.jsx("span",{children:"Third Choice college choice"}),e.jsx(r,{className:`${s?"rotate-180 transform":""} h-5 w-5 text-slate-700`})]}),e.jsx(i.Panel,{className:"px-4 pb-2 pt-4 text-sm text-slate-800",children:e.jsxs("div",{className:"grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2",children:[e.jsxs("div",{className:"col-span-3",children:[e.jsx("label",{htmlFor:"college_choice3",className:"block text-sm font-medium leading-6 text-gray-900",children:"College Name"}),e.jsx("div",{className:"mt-2",children:e.jsx("input",{type:"text",name:"college_choice3",id:"college_choice3",value:l.college_choice3,autoComplete:"college_choice3",onChange:t=>a("college_choice3",t.target.value),className:"block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"})})]}),e.jsxs("div",{className:"col-span-3",children:[e.jsx("label",{htmlFor:"college_major3",className:"block text-sm font-medium leading-6 text-gray-900",children:"College Major"}),e.jsx("div",{className:"mt-2",children:e.jsx("input",{type:"text",name:"college_major3",id:"college_major3",value:l.college_major3,autoComplete:"given-name",onChange:t=>a("college_major3",t.target.value),className:"block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"})})]}),e.jsxs("div",{className:"col-span-6",children:[e.jsx("label",{htmlFor:"college_status3",className:"block text-sm font-medium leading-6 text-gray-900",children:"Current Admission Status"}),e.jsxs("select",{id:"college_status3",name:"college_status3",value:l.college_status3,onChange:t=>a("college_status3",t.target.value),className:"h-10 mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6",defaultValue:"Canada",children:[e.jsx("option",{value:"Not Started",children:"Not Started"}),e.jsx("option",{value:"Pending",children:"Pending"}),e.jsx("option",{value:"Accepted",children:"Accepted"}),e.jsx("option",{value:"Decline",children:"Decline"})]})]})]})})]})}),e.jsxs("div",{className:"mt-8 grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2",children:[e.jsxs("div",{className:"sm:col-span-3",children:[e.jsx("label",{htmlFor:"sat_score",className:"block text-sm font-medium leading-6 text-gray-900",children:"Sat Score"}),e.jsx("div",{className:"mt-2",children:e.jsx("input",{type:"text",name:"sat_score",value:l.sat_score,id:"sat_score",onChange:s=>a("sat_score",s.target.value),className:"block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"})})]}),e.jsxs("div",{className:"sm:col-span-3",children:[e.jsx("label",{htmlFor:"sat_scheduled",className:"block text-sm font-medium leading-6 text-gray-900",children:"Sat Schedule Date"}),e.jsx("div",{className:"mt-2",children:e.jsx("input",{type:"date",name:"sat_scheduled",id:"sat_scheduled",value:l.sat_scheduled,onChange:s=>a("sat_scheduled",s.target.value),className:"block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"})})]}),e.jsxs("div",{className:"sm:col-span-3",children:[e.jsx("label",{htmlFor:"act_score",className:"block text-sm font-medium leading-6 text-gray-900",children:"Act Score"}),e.jsx("div",{className:"mt-2",children:e.jsx("input",{type:"text",name:"act_score",id:"act_score",value:l.act_score,onChange:s=>a("act_score",s.target.value),className:"block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"})})]}),e.jsxs("div",{className:"sm:col-span-3",children:[e.jsx("label",{htmlFor:"act_scheduled",className:"block text-sm font-medium leading-6 text-gray-900",children:"Act Schedule Date"}),e.jsx("div",{className:"mt-2",children:e.jsx("input",{type:"date",name:"act_scheduled",id:"act_scheduled",value:l.act_scheduled,onChange:s=>a("act_scheduled",s.target.value),className:"block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"})})]})]})]})]}),e.jsxs("div",{className:"grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 md:grid-cols-3",children:[e.jsxs("div",{children:[e.jsx("h2",{className:"text-base font-semibold leading-7 text-gray-900",children:"Referenece Information"}),e.jsx("p",{className:"mt-1 text-sm leading-6 text-gray-600"})]}),e.jsx("div",{className:"max-w-2xl space-y-10 md:col-span-2",children:e.jsx(i,{children:({open:s})=>e.jsxs(e.Fragment,{children:[e.jsxs(i.Button,{className:"flex w-full justify-between rounded-lg bg-red-100 px-4 py-2 text-left text-md font-medium text-gray-900 hover:bg-red-200 focus:outline-none focus-visible:ring focus-visible:ring-red-300/75",children:[e.jsx("span",{children:"First Reference"}),e.jsx(r,{className:`${s?"rotate-180 transform":""} h-5 w-5 text-purple-500`})]}),e.jsx(i.Panel,{className:"px-4 pb-2 pt-4 text-sm text-gray-500",children:e.jsxs("div",{className:"grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2",children:[e.jsxs("div",{className:"col-span-3",children:[e.jsx("label",{htmlFor:"reference",className:"block text-sm font-medium leading-6 text-gray-900",children:"Reference Name"}),e.jsx("div",{className:"mt-2",children:e.jsx("input",{type:"text",name:"reference",id:"reference",className:"block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"})})]}),e.jsxs("div",{className:"col-span-3",children:[e.jsx("label",{htmlFor:"reference_email",className:"block text-sm font-medium leading-6 text-gray-900",children:"Reference Email"}),e.jsx("div",{className:"mt-2",children:e.jsx("input",{type:"text",name:"reference_email",id:"reference_email",className:"block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"})})]}),e.jsxs("div",{className:"col-span-6",children:[e.jsx("label",{htmlFor:"reference_relationsship",className:"block text-sm font-medium leading-6 text-gray-900",children:"How do you know the reference?"}),e.jsxs("select",{id:"reference_relationsship",name:"reference_relationsship",className:"mt-2 block w-full h-10 rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6",defaultValue:"Employer",children:[e.jsx("option",{children:"Teacher\\Counsoler"}),e.jsx("option",{children:"Pastor"}),e.jsx("option",{children:"Employer"}),e.jsx("option",{children:"Family Friend"}),e.jsx("option",{children:"Other"})]})]})]})})]})})})]}),e.jsxs("div",{className:"grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 md:grid-cols-3",children:[e.jsxs("div",{children:[e.jsx("h2",{className:"text-base font-semibold leading-7 text-gray-900",children:"Addtional Information Information"}),e.jsx("p",{className:"mt-1 text-sm leading-6 text-gray-600"})]}),e.jsxs("div",{className:"grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2",children:[e.jsxs("div",{className:"col-span-full",children:[e.jsx("label",{htmlFor:"application_essay",className:"block text-sm font-medium leading-6 text-gray-900",children:"Short Essay"}),e.jsx("div",{className:"mt-2",children:e.jsx("textarea",{id:"application_essay",name:"application_essay",value:l.application_essay,onChange:s=>a("application_essay",s.target.value),rows:10,className:"block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6",defaultValue:""})}),e.jsx("p",{className:"mt-3 text-sm leading-6 text-gray-600",children:"Write a few sentences about yourself."})]}),e.jsxs("div",{className:"col-span-full",children:[e.jsx("label",{htmlFor:"community_service",className:"block text-sm font-medium leading-6 text-gray-900",children:"Community Service List"}),e.jsx("div",{className:"mt-2",children:e.jsx("textarea",{id:"community_service",name:"community_service",value:l.community_service,onChange:s=>a("community_service",s.target.value),rows:10,className:"block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6",defaultValue:""})}),e.jsx("p",{className:"mt-3 text-sm leading-6 text-gray-600",children:"List your communinity Service ex:Company name, Jobtile, date,"})]}),e.jsx("div",{className:"mt-6 col-span-full items-center justify-center gap-x-6",children:e.jsx("button",{href:o,type:"submit",className:"flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600",children:"Submit"})})]})]})]}))})})})})]})}export{V as default};
