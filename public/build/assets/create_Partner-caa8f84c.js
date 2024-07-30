import{r as l,W as u,j as e}from"./app-44e6087d.js";import{T as n}from"./TextInput-94386761.js";import{C as p}from"./Checkbox-b208ca78.js";import{C as f}from"./CheckIcon-cd58e699.js";import{q as m}from"./transition-6816727b.js";import{_ as d}from"./dialog-32ab243b.js";import"./use-is-mounted-060cb39a.js";import"./use-owner-13333598.js";import"./keyboard-12cbf972.js";import"./bugs-0c7cdab9.js";import"./hidden-5f7c5d87.js";function b({title:s,titleId:a,...i},o){return l.createElement("svg",Object.assign({xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24",strokeWidth:1.5,stroke:"currentColor","aria-hidden":"true","data-slot":"icon",ref:o,"aria-labelledby":a},i),s?l.createElement("title",{id:a},s):null,l.createElement("path",{strokeLinecap:"round",strokeLinejoin:"round",d:"M12 4.5v15m7.5-7.5h-15"}))}const y=l.forwardRef(b),j=y;function E(){const{data:s,setData:a,post:i,processing:o,errors:v}=u({organization_name:"",contact_name:"",email:"",phone:"",address:"",city:"",state:"",zip:"",consent:!1});let[x,r]=l.useState(!1);const c=l.useRef(null);function g(){r(!0)}function h(t){t.preventDefault(),i(route("partner.create"))}return e.jsxs(e.Fragment,{children:[e.jsx("button",{className:"items-center w-full",onClick:g,children:e.jsxs("div",{class:"relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border items-center h-52",children:[e.jsx("div",{class:"p-4 mx-[25%] mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent",children:e.jsx("div",{class:"text-center bg-center icon bg-gradient-to-tl from-red-700 to-pink-500 shadow-soft-2xl rounded-xl",children:e.jsx(j,{className:"text-white h-12 w-12 p-4"})})}),e.jsx("div",{class:"flex-auto p-4 pt-0 text-center",children:e.jsx("p",{class:"mb-0 text-center md:text-base lg:text-lg text-gray-700",children:"Create New Partner"})})]})}),e.jsx(m,{appear:!0,show:x,as:l.Fragment,children:e.jsxs(d,{as:"div",className:"relative z-10",initialFocus:c,onClose:r,children:[e.jsx(m.Child,{as:l.Fragment,enter:"ease-out duration-300",enterFrom:"opacity-0",enterTo:"opacity-100",leave:"ease-in duration-200",leaveFrom:"opacity-100",leaveTo:"opacity-0",children:e.jsx("div",{className:"fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"})}),e.jsx("div",{className:"fixed inset-0 z-10 w-screen overflow-y-auto",children:e.jsx("div",{className:"flex min-h-full items-end justify-center p-4 text-left sm:items-center sm:p-0",children:e.jsx(m.Child,{as:l.Fragment,enter:"ease-out duration-300",enterFrom:"opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95",enterTo:"opacity-100 translate-y-0 sm:scale-100",leave:"ease-in duration-200",leaveFrom:"opacity-100 translate-y-0 sm:scale-100",leaveTo:"opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95",children:e.jsx(d.Panel,{className:"relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-2xl sm:p-6",children:e.jsxs("div",{children:[e.jsx("div",{className:"mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-green-100",children:e.jsx(f,{className:"h-6 w-6 text-green-600","aria-hidden":"true"})}),e.jsxs("div",{className:"mt-3 text-center sm:mt-5",children:[e.jsx(d.Title,{as:"h3",className:"text-base font-semibold leading-6 text-gray-900",children:"Create Partner"}),e.jsx("div",{className:"mt-2",children:e.jsxs("form",{onSubmit:h,children:[e.jsxs("div",{className:"space-y-12",children:[e.jsx("div",{className:"border-b border-gray-900/10 pb-8",children:e.jsx("div",{className:"mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6",children:e.jsxs("div",{className:"col-span-full",children:[e.jsx("label",{htmlFor:"street-address",className:"block text-base text-left font-medium leading-6 text-gray-900",children:"Name of Partner"}),e.jsx("div",{className:"mt-2",children:e.jsx(n,{type:"text",name:"organization_name",value:s.organization_name,id:"organization_name",autoComplete:"organization_name",onChange:t=>a("organization_name",t.target.value),className:"mt-1 block w-full"})})]})})}),e.jsxs("div",{className:"border-b border-gray-900/10 pb-8",children:[e.jsx("h2",{className:"text-base text-left font-semibold leading-7 text-gray-900",children:"Contact Information"}),e.jsxs("div",{className:"mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6",children:[e.jsxs("div",{className:"sm:col-span-3",children:[e.jsx("label",{htmlFor:"first-name",className:"block text-sm text-left font-medium leading-6 text-gray-900",children:"Contact Name"}),e.jsx("div",{className:"mt-2",children:e.jsx(n,{type:"text",name:"contact_name",value:s.contact_name,id:"contact_name",autoComplete:"contact_name",onChange:t=>a("contact_name",t.target.value),className:"mt-1 block w-full"})})]}),e.jsxs("div",{className:"sm:col-span-3",children:[e.jsx("label",{htmlFor:"first-name",className:"block text-sm text-left font-medium leading-6 text-gray-900",children:"Contact email"}),e.jsx("div",{className:"mt-2",children:e.jsx(n,{type:"email",name:"email",value:s.email,id:"email",autoComplete:"email",onChange:t=>a("email",t.target.value),className:"block w-full rounded-md border-0 py-2 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6",placeholder:"ex: 2000"})})]}),e.jsxs("div",{className:"sm:col-span-3",children:[e.jsx("label",{htmlFor:"email",className:"block text-sm text-left font-medium leading-6 text-gray-900",children:"Phone"}),e.jsx("div",{className:"mt-2",children:e.jsx(n,{id:"phone",name:"phone",value:s.phone,type:"text",autoComplete:"phone",onChange:t=>a("phone",t.target.value),className:"block w-full rounded-md border-0 py-2 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6",placeholder:"ex: 716 508 9999"})})]}),e.jsxs("div",{className:"sm:col-span-3",children:[e.jsx("label",{htmlFor:"email",className:"block text-sm text-left font-medium leading-6 text-gray-900",children:"Address"}),e.jsx("div",{className:"mt-2",children:e.jsx(n,{id:"address",name:"address",value:s.address,type:"text",autoComplete:"address",onChange:t=>a("address",t.target.value),className:"block w-full rounded-md border-0 py-2 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"})})]}),e.jsxs("div",{className:"sm:col-span-2",children:[e.jsx("label",{htmlFor:"city",className:"block text-sm text-left font-medium leading-6 text-gray-900",children:"City"}),e.jsx("div",{className:"mt-2",children:e.jsx(n,{id:"city",name:"city",value:s.city,type:"text",autoComplete:"city",onChange:t=>a("city",t.target.value),className:"block w-full rounded-md border-0 py-2 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"})})]}),e.jsxs("div",{className:"sm:col-span-2",children:[e.jsx("label",{htmlFor:"email",className:"block text-sm text-left font-medium leading-6 text-gray-900",children:"State"}),e.jsx("div",{className:"mt-2",children:e.jsx(n,{id:"state",name:"state",value:s.state,type:"text",autoComplete:"state",onChange:t=>a("state",t.target.value),className:"block w-full rounded-md border-0 py-2 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"})})]}),e.jsxs("div",{className:"sm:col-span-2",children:[e.jsx("label",{htmlFor:"email",className:"block text-sm text-left font-medium leading-6 text-gray-900",children:"Zip"}),e.jsx("div",{className:"mt-2",children:e.jsx(n,{id:"zip",name:"zip",value:s.zip,type:"text",autoComplete:"zip",onChange:t=>a("zip",t.target.value),className:"block w-full rounded-md border-0 py-2 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"})})]}),e.jsx("div",{className:"relative flex items-start sm:col-span-full",children:e.jsx("div",{className:"ml-3 text-base leading-6",children:e.jsxs("label",{className:"flex items-center",children:[e.jsx(p,{name:"consent",checked:s.consent,onChange:t=>a("consent",t.target.checked)}),e.jsxs("span",{className:"ml-2 text-base text-gray-800",children:["Consent ",e.jsx("br",{})," I acknowledge and give permission for Black Scholars to use our scholarship information fund on the public facing website for students."]})]})})})]})]})]}),e.jsxs("div",{className:"mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3",children:[e.jsx("button",{type:"submit",className:"inline-flex w-full px-2 py-3 my-4 font-bold justify-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro text-xs bg-gradient-to-tl from-red-700 to-pink-500 hover:shadow-soft-2xl hover:scale-102 sm:col-start-2",disabled:o,onClick:()=>r(!1),children:"Submit"}),e.jsx("button",{type:"button",className:"mt-3 inline-flex w-full justify-center rounded-md bg-white py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:col-start-1 sm:mt-0",onClick:()=>r(!1),ref:c,children:"Cancel"})]})]})})]})]})})})})})]})})]})}export{E as default};
