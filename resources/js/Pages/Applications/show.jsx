import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Head, usePage, Link } from "@inertiajs/react";
import { PaperClipIcon } from '@heroicons/react/20/solid'

export default function ApplicationShow({auth, applicationdetail}) {
  
console.log(applicationdetail);
    // const Value = data.reduce((a,c) => a + c.inprogress, 0);

  return (
    <Authenticated
      user={auth.user}
      header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Application View</h2>}
      breadcrumb={<span><Link href={route('application.list')}>Applicants list</Link></span>} >
      
      <Head title="Application View" />
      <div className="mx-auto grid grid-cols-1 gap-x-4 gap-y-8 px-4 py-8 sm:px-6 sm:py-10 lg:max-w-7xl lg:grid-cols-2 lg:px-2">
      {applicationdetail.map(({
                    id,
                    scholarship_id,
                    awarded,
                    name,
                    email,
                    submitted_on,
                    phone,
                    parent_name,
                    parent_job,
                    parent_phone,
                    parent_email,
                    applicant_essay,
                    community_service,
                    school,
                    graduation_year,
                    gpa,
                    sat_Scheduled,
                    sat_Score,
                    act_scheduled,
                    act_score,
                    ap_test_name,
                    ap_test_score,
                    ap_test_name2,
                    family_income,
                    siblings,
                    siblings_attending_college,
                    fasfa_acknowledgement,
                    college_choice,
                    college_major,
                    college_status,
                    college_choice2,
                    college_major2,
                    college_status2,
                    scholarship_choice,
                    reference,
                    reference_email1,
                    reference_relationshiip,
                    reference2,
                    reference_email2,
                    reference_relationshiip2,
                    resume_upload,
                    essay_upload,
                    additional_information_upload,
                }) => (
                    <>
            <div className="w-full px-2 py-3 mx-auto">
                <div className="overflow-hidden bg-white shadow sm:rounded-lg">
                <div className="px-4 py-6 sm:px-6">
                    <div className="flex justify-between">
                    <h3 className="text-base font-semibold leading-7 text-gray-900">Applicant Information</h3>
                    <Link
                        href={route('create.notes', {id})}
                        className="rounded-md bg-indigo-600 px-2 py-1 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    >
                        Create Note
                    </Link>
                    </div>
                    <p className="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Personal details and application.</p>
                </div>
                
                    <div className="border-t border-gray-100" key={id}>
                        <dl className="divide-y divide-gray-100">
                        <div className="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt className="text-sm font-medium text-gray-900">Full name</dt>
                            <dd className="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{name}</dd>
                        </div>
                        <div className="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt className="text-sm font-medium text-gray-900">Email address</dt>
                            <dd className="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{email}</dd>
                        </div>
                        <div className="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt className="text-sm font-medium text-gray-900">College Choice & Status</dt>
                            <dd className="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{college_choice} - {college_status}</dd>
                            <dt className="text-sm font-medium text-gray-900">College Choice & Status 2</dt>
                            <dd className="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{college_choice2} - {college_status2}</dd>
                        </div>
                        <div className="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt className="text-sm font-medium text-gray-900">College & Major 1</dt>
                            <dd className="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{college_major}</dd>
                            <dt className="text-sm font-medium text-gray-900">College & Major 2</dt>
                            <dd className="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{college_major2}</dd>
                        </div>
                        
                        <div className="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt className="text-sm font-medium text-gray-900">Current School / GPa</dt>
                            <dd className="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{school} - {gpa}</dd>
                        </div>
                        <div className="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt className="text-sm font-medium text-gray-900">SAT Status / Score</dt>
                            <dd className="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{sat_Scheduled} - {sat_Score}</dd>
                            <dt className="text-sm font-medium text-gray-900">ACT Status / Score</dt>
                            <dd className="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{act_scheduled} - {act_score}</dd>
                        </div>
                        {/* <div className="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt className="text-sm font-medium text-gray-900">About</dt>
                            <dd className="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur
                            qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud
                            pariatur mollit ad adipisicing reprehenderit deserunt qui eu.
                            </dd>
                        </div> */}
                        <div className="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt className="text-sm font-medium text-gray-900">Parent / Guardian Info</dt>
                            <dd className="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{parent_name}</dd>
                        </div>
                        </dl>
                    </div>
                    
                </div>
            </div>

            <div className="w-full px-2 py-3 mx-auto">
                <div className="overflow-hidden bg-white shadow sm:rounded-lg">
                    <div className="px-4 py-6 sm:px-6">
                        <h3 className="text-base font-semibold leading-7 text-gray-900">Eassay Information</h3>
                        <p className="mt-1 max-w-2xl text-sm leading-6 text-gray-700">{applicant_essay}</p>
                    </div>
                    <div className="px-4 py-6 sm:px-6 border-t border-gray-100">
                        <h3 className="text-base font-semibold leading-7 text-gray-900">Community Sevice Information</h3>
                        <p className="mt-1 max-w-2xl text-sm leading-6 text-gray-700">{community_service}</p>
                    </div>
                    <div className="px-4 py-6 sm:px-6 border-t border-gray-100">
                        <h3 className="text-base font-semibold leading-7 text-gray-900">Reference Information 1</h3>
                        <p className="mt-1 max-w-2xl text-sm leading-6 text-gray-700">{reference} <br/>Relationship<br/>{reference_relationshiip} </p>
                    </div>
                    <div className="px-4 py-6 sm:px-6 border-t border-gray-100">
                        <h3 className="text-base font-semibold leading-7 text-gray-900">Reference Information 2</h3>
                        <p className="mt-1 max-w-2xl text-sm leading-6 text-gray-700">{reference2} - {reference_email2} <br/>Relationship<br/>{reference_relationshiip2}</p>
                    </div>
                </div>
            </div>
            </>
        ))}
      </div>

    </Authenticated>
  );
}
