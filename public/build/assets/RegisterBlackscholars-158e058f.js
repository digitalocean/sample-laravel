import{W as h,r as i,j as e,a as g,d}from"./app-2bf52fd5.js";import{G as f}from"./GuestLayout-75040a18.js";import{I as l}from"./InputError-4a79570b.js";import{I as n}from"./InputLabel-18566504.js";import{P as j}from"./PrimaryButton-f15529f7.js";import{T as m}from"./TextInput-d6888eeb.js";import{$ as o}from"./tabs-1309b653.js";import"./keyboard-03b206b2.js";import"./use-is-mounted-6b3edc2a.js";import"./use-resolve-button-type-e1f41b1f.js";function q(){const{data:s,setData:r,post:c,processing:u,errors:t,reset:x}=h({name:"",email:"",password:"",password_confirmation:"",parent_name:"",parent_email:"",parent_name2:"",parent_email2:"",graduation_year:"",school:""});i.useState(0),i.useEffect(()=>()=>{x("password","password_confirmation")},[]);const p=a=>{a.preventDefault(),c(route("register.scholars"))};return e.jsxs(f,{children:[e.jsx(g,{title:"Register Scholar"}),e.jsxs("main",{className:"mt-0 transition-all duration-200 ease-soft-in-out",children:[e.jsxs("section",{className:"mb-6",children:[e.jsxs("div",{className:"relative flex items-start pt-8 pb-42 m-4 overflow-hidden bg-center bg-cover min-h-50-screen rounded-xl bg-black",children:[e.jsx("span",{className:"absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-br from-red-800 to-red-600 opacity-80"}),e.jsx("div",{className:"container z-10",children:e.jsx("div",{className:"flex flex-wrap justify-center -mx-3",children:e.jsxs("div",{className:"w-full max-w-full px-3 mx-auto mt-0 text-center lg:flex-0 shrink-0 lg:w-5/12",children:[e.jsx("h1",{className:"mt-16 mb-2 text-white",children:"Welcome! Early Recognition Scholars"}),e.jsx("p",{className:"text-white",children:"Please register below. "})]})})})]}),e.jsx("div",{className:"container",children:e.jsx("div",{className:"flex flex-wrap -mx-3 -mt-12 md:-mt-20 lg:-mt-40",children:e.jsx("div",{className:"w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-5/12",children:e.jsx("div",{className:"relative z-0 flex flex-col h-[575px] min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border",children:e.jsx("div",{className:"flex-auto p-6",children:e.jsxs(o.Group,{onChange:a=>{console.log("Changed selected tab to:",a)},children:[e.jsx("div",{className:"py-8",children:e.jsxs(o.List,{children:[e.jsx(o,{as:i.Fragment,children:({selected:a})=>e.jsx("button",{className:a?"border-spacing-1 border-2 rounded border-red-800 text-red-800 py-2 w-1/3":"bg-white text-black py-2 w-1/3",children:"Register"})}),e.jsx(o,{as:i.Fragment,children:({selected:a})=>e.jsx("button",{className:a?"border-spacing-1 border-2 rounded border-red-800 text-red-800 py-2 w-1/3":"bg-white text-black py-2 w-1/3",children:"Parent Info"})}),e.jsx(o,{as:i.Fragment,children:({selected:a})=>e.jsx("button",{className:a?"border-spacing-1 border-2 rounded border-red-800 text-red-800 py-2 w-1/3":"bg-white text-black py-2 w-1/3",children:"School Information"})})]})}),e.jsx(o.Panels,{children:e.jsxs("form",{onSubmit:p,className:"py-4",children:[e.jsxs(o.Panel,{children:[e.jsxs("div",{children:[e.jsx(n,{htmlFor:"name",value:"Name"}),e.jsx(m,{id:"name",name:"name",value:s.name,className:"mt-1 block w-full",autoComplete:"name",isFocused:!0,onChange:a=>r("name",a.target.value),required:!0}),e.jsx(l,{message:t.name,className:"mt-2"})]}),e.jsxs("div",{className:"mt-4",children:[e.jsx(n,{htmlFor:"email",value:"Email"}),e.jsx(m,{id:"email",type:"email",name:"email",value:s.email,className:"mt-1 block w-full",autoComplete:"username",onChange:a=>r("email",a.target.value),required:!0}),e.jsx(l,{message:t.email,className:"mt-2"})]}),e.jsxs("div",{className:"mt-4",children:[e.jsx(n,{htmlFor:"password",value:"Password"}),e.jsx(m,{id:"password",type:"password",name:"password",value:s.password,className:"mt-1 block w-full",autoComplete:"new-password",onChange:a=>r("password",a.target.value),required:!0}),e.jsx(l,{message:t.password,className:"mt-2"})]}),e.jsxs("div",{className:"mt-4",children:[e.jsx(n,{htmlFor:"password_confirmation",value:"Confirm Password"}),e.jsx(m,{id:"password_confirmation",type:"password",name:"password_confirmation",value:s.password_confirmation,className:"mt-1 block w-full",autoComplete:"new-password",onChange:a=>r("password_confirmation",a.target.value),required:!0}),e.jsx(l,{message:t.password_confirmation,className:"mt-2"})]}),e.jsx("div",{className:"flex items-center justify-end mt-4",children:e.jsx(d,{href:route("login"),className:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500",children:"Already registered?"})})]}),e.jsxs(o.Panel,{children:[e.jsxs("div",{children:[e.jsx(n,{htmlFor:"parent_name",value:"Parent/Gaurdian name"}),e.jsx(m,{id:"parent_name",name:"parent_name",value:s.parent_name,className:"mt-1 block w-full",autoComplete:"parent_name",isFocused:!0,onChange:a=>r("parent_name",a.target.value),required:!0}),e.jsx(l,{message:t.parent_name,className:"mt-2"})]}),e.jsxs("div",{className:"mt-4",children:[e.jsx(n,{htmlFor:"parent_email",value:"Parent/Gaurdian Email"}),e.jsx(m,{id:"parent_email",type:"email",name:"parent_email",value:s.parent_email,className:"mt-1 block w-full",autoComplete:"username",onChange:a=>r("parent_email",a.target.value),required:!0}),e.jsx(l,{message:t.parent_email,className:"mt-2"})]}),e.jsxs("div",{className:"mt-4",children:[e.jsx(n,{htmlFor:"parent_name2",value:"Secondary Parent/Gaurdian name"}),e.jsx(m,{id:"parent_name2",name:"parent_name2",value:s.parent_name2,className:"mt-1 block w-full",autoComplete:"parent_name2",onChange:a=>r("parent_name2",a.target.value),required:!0}),e.jsx(l,{message:t.parent_name2,className:"mt-2"})]}),e.jsxs("div",{className:"mt-4",children:[e.jsx(n,{htmlFor:"parent_email2",value:"Secondary Parent/Gaurdian  Email"}),e.jsx(m,{id:"parent_email2",type:"email",name:"parent_email2",value:s.parent_email2,className:"mt-1 block w-full",autoComplete:"email2",onChange:a=>r("parent_email2",a.target.value),required:!0}),e.jsx(l,{message:t.parent_email2,className:"mt-2"})]}),e.jsx("div",{className:"flex items-center justify-end mt-4",children:e.jsx(d,{href:route("login"),className:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500",children:"Already registered?"})})]}),e.jsxs(o.Panel,{children:[e.jsxs("div",{children:[e.jsx(n,{htmlFor:"school",value:"School Name"}),e.jsx(m,{id:"school",name:"school",value:s.school,className:"mt-1 block w-full",autoComplete:"school",isFocused:!0,onChange:a=>r("school",a.target.value),required:!0}),e.jsx(l,{message:t.school,className:"mt-2"})]}),e.jsxs("div",{className:"mt-4",children:[e.jsx(n,{htmlFor:"graduation_year",value:"Graduation Year"}),e.jsx(m,{id:"graduation_year",name:"graduation_year",value:s.graduation_year,className:"mt-1 block w-full",autoComplete:"graduation year",onChange:a=>r("graduation_year",a.target.value),required:!0}),e.jsx(l,{message:t.graduation_year,className:"mt-2"})]}),e.jsxs("div",{className:"flex items-center justify-end mt-4",children:[e.jsx(d,{href:route("login"),className:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500",children:"Already registered?"}),e.jsx(j,{className:"ml-4",disabled:u,children:"Submit"})]})]})]})})]})})})})})})]}),e.jsx("footer",{className:"py-2",children:e.jsxs("div",{className:"container",children:[e.jsx("div",{className:"flex flex-wrap -mx-3"}),e.jsx("div",{className:"flex flex-wrap -mx-3",children:e.jsx("div",{className:"w-8/12 max-w-full px-3 mx-auto mt-1 text-center flex-0",children:e.jsxs("p",{className:"mb-0 text-slate-400",children:["Copyright ©",e.jsx("script",{children:"document.write(new Date().getFullYear());"}),"Urban League - Black Scholars."]})})})]})})]})]})}export{q as default};
