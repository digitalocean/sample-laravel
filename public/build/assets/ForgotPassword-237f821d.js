import{W as n,j as e,a as d}from"./app-c6eb9c27.js";import{G as u}from"./GuestLayout-3a897a5e.js";import{I as c}from"./InputError-11f229f7.js";import{P as x}from"./PrimaryButton-0690a387.js";import{T as p}from"./TextInput-5f3bfe8b.js";function y({status:a}){const{data:t,setData:o,post:r,processing:m,errors:l}=n({email:""}),i=s=>{s.preventDefault(),r(route("password.email"))};return e.jsxs(u,{children:[e.jsx(d,{title:"Forgot Password"}),e.jsx("div",{className:"mb-4 text-sm text-gray-600",children:"Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one."}),a&&e.jsx("div",{className:"mb-4 font-medium text-sm text-green-600",children:a}),e.jsxs("form",{onSubmit:i,children:[e.jsx(p,{id:"email",type:"email",name:"email",value:t.email,className:"mt-1 block w-full",isFocused:!0,onChange:s=>o("email",s.target.value)}),e.jsx(c,{message:l.email,className:"mt-2"}),e.jsx("div",{className:"flex items-center justify-end mt-4",children:e.jsx(x,{className:"ml-4",disabled:m,children:"Email Password Reset Link"})})]})]})}export{y as default};