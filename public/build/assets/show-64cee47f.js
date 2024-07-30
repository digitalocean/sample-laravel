import{j as s,d as t,a as A}from"./app-44e6087d.js";import{A as I}from"./AuthenticatedLayout-925f0a4d.js";import"./transition-6816727b.js";import"./use-is-mounted-060cb39a.js";function $({auth:m,applicationdetail:e}){return console.log(e),s.jsxs(I,{user:m.user,header:s.jsx("h2",{className:"font-semibold text-xl text-gray-800 leading-tight",children:"Application View"}),breadcrumb:s.jsx("span",{children:s.jsx(t,{href:route("application.list"),children:"Applicants list"})}),children:[s.jsx(A,{title:"Application View"}),s.jsx("div",{className:"mx-auto grid grid-cols-1 gap-x-4 gap-y-8 px-4 py-8 sm:px-6 sm:py-10 lg:max-w-7xl lg:grid-cols-2 lg:px-2",children:e.map(({id:a,scholarship_id:R,awarded:E,name:l,email:i,submitted_on:P,phone:F,parent_name:d,parent_job:G,parent_phone:M,parent_email:T,applicant_essay:r,community_service:x,school:n,graduation_year:V,gpa:c,sat_Scheduled:o,sat_Score:g,act_scheduled:p,act_score:h,ap_test_name:k,ap_test_score:q,ap_test_name2:z,family_income:B,siblings:D,siblings_attending_college:H,fasfa_acknowledgement:J,college_choice:j,college_major:y,college_status:N,college_choice2:u,college_major2:f,college_status2:b,scholarship_choice:K,reference:v,reference_email1:L,reference_relationshiip:w,reference2:_,reference_email2:C,reference_relationshiip2:S,resume_upload:O,essay_upload:Q,additional_information_upload:U})=>s.jsxs(s.Fragment,{children:[s.jsx("div",{className:"w-full px-2 py-3 mx-auto",children:s.jsxs("div",{className:"overflow-hidden bg-white shadow sm:rounded-lg",children:[s.jsxs("div",{className:"px-4 py-6 sm:px-6",children:[s.jsxs("div",{className:"flex justify-between",children:[s.jsx("h3",{className:"text-base font-semibold leading-7 text-gray-900",children:"Applicant Information"}),s.jsx(t,{href:route("create.notes",{id:a}),className:"rounded-md bg-indigo-600 px-2 py-1 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600",children:"Create Note"})]}),s.jsx("p",{className:"mt-1 max-w-2xl text-sm leading-6 text-gray-500",children:"Personal details and application."})]}),s.jsx("div",{className:"border-t border-gray-100",children:s.jsxs("dl",{className:"divide-y divide-gray-100",children:[s.jsxs("div",{className:"px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6",children:[s.jsx("dt",{className:"text-sm font-medium text-gray-900",children:"Full name"}),s.jsx("dd",{className:"mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0",children:l})]}),s.jsxs("div",{className:"px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6",children:[s.jsx("dt",{className:"text-sm font-medium text-gray-900",children:"Email address"}),s.jsx("dd",{className:"mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0",children:i})]}),s.jsxs("div",{className:"px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6",children:[s.jsx("dt",{className:"text-sm font-medium text-gray-900",children:"College Choice & Status"}),s.jsxs("dd",{className:"mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0",children:[j," - ",N]}),s.jsx("dt",{className:"text-sm font-medium text-gray-900",children:"College Choice & Status 2"}),s.jsxs("dd",{className:"mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0",children:[u," - ",b]})]}),s.jsxs("div",{className:"px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6",children:[s.jsx("dt",{className:"text-sm font-medium text-gray-900",children:"College & Major 1"}),s.jsx("dd",{className:"mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0",children:y}),s.jsx("dt",{className:"text-sm font-medium text-gray-900",children:"College & Major 2"}),s.jsx("dd",{className:"mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0",children:f})]}),s.jsxs("div",{className:"px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6",children:[s.jsx("dt",{className:"text-sm font-medium text-gray-900",children:"Current School / GPa"}),s.jsxs("dd",{className:"mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0",children:[n," - ",c]})]}),s.jsxs("div",{className:"px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6",children:[s.jsx("dt",{className:"text-sm font-medium text-gray-900",children:"SAT Status / Score"}),s.jsxs("dd",{className:"mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0",children:[o," - ",g]}),s.jsx("dt",{className:"text-sm font-medium text-gray-900",children:"ACT Status / Score"}),s.jsxs("dd",{className:"mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0",children:[p," - ",h]})]}),s.jsxs("div",{className:"px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6",children:[s.jsx("dt",{className:"text-sm font-medium text-gray-900",children:"Parent / Guardian Info"}),s.jsx("dd",{className:"mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0",children:d})]})]})},a)]})}),s.jsx("div",{className:"w-full px-2 py-3 mx-auto",children:s.jsxs("div",{className:"overflow-hidden bg-white shadow sm:rounded-lg",children:[s.jsxs("div",{className:"px-4 py-6 sm:px-6",children:[s.jsx("h3",{className:"text-base font-semibold leading-7 text-gray-900",children:"Eassay Information"}),s.jsx("p",{className:"mt-1 max-w-2xl text-sm leading-6 text-gray-700",children:r})]}),s.jsxs("div",{className:"px-4 py-6 sm:px-6 border-t border-gray-100",children:[s.jsx("h3",{className:"text-base font-semibold leading-7 text-gray-900",children:"Community Sevice Information"}),s.jsx("p",{className:"mt-1 max-w-2xl text-sm leading-6 text-gray-700",children:x})]}),s.jsxs("div",{className:"px-4 py-6 sm:px-6 border-t border-gray-100",children:[s.jsx("h3",{className:"text-base font-semibold leading-7 text-gray-900",children:"Reference Information 1"}),s.jsxs("p",{className:"mt-1 max-w-2xl text-sm leading-6 text-gray-700",children:[v," ",s.jsx("br",{}),"Relationship",s.jsx("br",{}),w," "]})]}),s.jsxs("div",{className:"px-4 py-6 sm:px-6 border-t border-gray-100",children:[s.jsx("h3",{className:"text-base font-semibold leading-7 text-gray-900",children:"Reference Information 2"}),s.jsxs("p",{className:"mt-1 max-w-2xl text-sm leading-6 text-gray-700",children:[_," - ",C," ",s.jsx("br",{}),"Relationship",s.jsx("br",{}),S]})]})]})})]}))})]})}export{$ as default};
