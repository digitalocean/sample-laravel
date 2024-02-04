import{q as g,r as u,j as e,d as h,a as p,y as f}from"./app-92c14741.js";import{A as j}from"./AuthenticatedLayout-636344fe.js";import{P as b}from"./PresentationChartBarIcon-c01bbdb9.js";import"./transition-912c7495.js";function k({auth:t}){const{users:d,partners:o,roles:m}=g().props,[i,c]=u.useState({name:"",email:"",password:"",partner_id:"",role:""});function a(s){const l=s.target.id,n=s.target.value;c(r=>({...r,[l]:n}))}function x(s){s.preventDefault(),f.post(route("user.store"),[i])}return e.jsxs(j,{user:t.user,header:e.jsx("h2",{className:"font-semibold text-xl text-gray-800 leading-tight",children:"create"}),breadcrumb:e.jsx("span",{children:e.jsx(h,{href:route("user.index"),children:"User list"})}),children:[e.jsx(p,{title:"Users"}),e.jsx("div",{class:"w-full px-6 py-6 mx-auto",children:e.jsx("div",{class:"w-full max-w-full px-3 xl:w-3/3 xl:flex-none mb-10",children:e.jsx("div",{class:"flex flex-wrap -mx-3",children:e.jsxs("div",{className:"w-full px-6 py-6 mx-auto",children:[e.jsx("div",{className:"flex flex-wrap -mx-1",children:e.jsx("div",{className:"w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/3",children:e.jsx("div",{className:"relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border",children:e.jsx("div",{className:"flex-auto p-4",children:e.jsxs("div",{className:"flex flex-row -mx-3",children:[e.jsx("div",{className:"flex-none w-2/3 max-w-full px-3",children:e.jsxs("div",{children:[e.jsx("p",{className:"mb-0 font-sans font-semibold leading-normal text-base",children:"Total Users"}),e.jsx("h5",{className:"mb-0 font-bold",children:d.length})]})}),e.jsx("div",{className:"px-3 text-right basis-1/3",children:e.jsx("div",{className:"inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-red-900 to-red-500",children:e.jsx(b,{className:"leading-none w-6 h-6 relative top-3.5 text-white"})})})]})})})})}),e.jsx("div",{className:"py-20",children:e.jsx("div",{className:"mx-auto max-w-2xl bg-white shadow-soft-xl rounded-2xl bg-clip-border",children:e.jsxs("div",{className:"p-6",children:[e.jsx("h2",{className:"text-base font-semibold leading-7 text-gray-900",children:"Personal Information"}),e.jsx("p",{className:"mt-1 text-sm leading-6 text-gray-600",children:"Use a permanent address where you can receive mail."}),e.jsx("form",{onSubmit:x,className:"w-full",children:e.jsxs("div",{className:"mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6",children:[e.jsxs("div",{className:"sm:col-span-3",children:[e.jsx("label",{htmlFor:"name",className:"block text-sm font-medium leading-6 text-gray-900",children:"Full name"}),e.jsx("div",{className:"mt-2",children:e.jsx("input",{type:"text",name:"name",id:"name",value:i.name,onChange:a,autoComplete:"given-name",className:"block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"})})]}),e.jsxs("div",{className:"sm:col-span-3",children:[e.jsx("label",{htmlFor:"email",className:"block text-sm font-medium leading-6 text-gray-900",children:"Email address"}),e.jsx("div",{className:"mt-2",children:e.jsx("input",{id:"email",name:"email",type:"email",value:i.email,onChange:a,autoComplete:"email",className:"block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"})})]}),e.jsxs("div",{className:"sm:col-span-3",children:[e.jsx("label",{htmlFor:"password",className:"block text-sm font-medium leading-6 text-gray-900",children:"Password"}),e.jsx("div",{className:"mt-2",children:e.jsx("input",{id:"password",name:"password",type:"password",autoComplete:"password",value:i.password,onChange:a,className:"block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"})})]}),e.jsxs("div",{className:"sm:col-span-3",children:[e.jsx("label",{htmlFor:"partner_id",className:"block text-sm font-medium leading-6 text-gray-900",children:"Partner Organization"}),e.jsx("div",{className:"mt-2",children:e.jsxs("select",{id:"partner_id",name:"partner_id",autoComplete:"partner_id",onChange:a,className:"block w-full h-10 rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6",children:[e.jsx("option",{children:"Select Partner"}),o.map(({id:s,contact_name:l,email:n,organization_name:r})=>e.jsx("option",{value:s,children:r}))]})})]}),e.jsxs("div",{className:"sm:col-span-3",children:[e.jsx("label",{htmlFor:"role",className:"block text-sm font-medium leading-6 text-gray-900",children:"Role"}),e.jsx("div",{className:"mt-2",children:e.jsxs("select",{id:"role",name:"role",autoComplete:"role",onChange:a,className:"block w-full h-10 rounded-md border-0 p-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6",children:[e.jsx("option",{children:"Select Role"}),m.map(({id:s,name:l})=>e.jsx("option",{value:l,children:l}))]})})]}),e.jsx("div",{className:"sm:col-span-6 pt-4",children:e.jsx("button",{type:"submit",className:"flex w-full justify-center rounded-md bg-gradient-to-tl from-red-900 to-red-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600",children:"Submit"})})]})})]})})})]})})})})]})}export{k as default};
