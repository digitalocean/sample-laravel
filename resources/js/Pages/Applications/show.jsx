import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Head, usePage, Link } from "@inertiajs/react";
import { PaperClipIcon } from '@heroicons/react/20/solid'

export default function ApplicationShow({auth, applicationdetail}) {
  

    // const Value = data.reduce((a,c) => a + c.inprogress, 0);

  return (
    <Authenticated
      user={auth.user}
      header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Application View</h2>}
      breadcrumb={<span><Link href={route('application.list')}>Applicants list</Link></span>} >
      
      <Head title="Application View" />

      <div className="w-full px-6 py-6 mx-auto">
        <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg p-14">
            <div className="px-4 sm:px-0">
                <h3 className="text-base font-semibold leading-7 text-gray-900">Applicant Information</h3>
                <p className="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Personal details and application.</p>
            </div>
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
                    <div className="mt-6" key={id}>
                        <dl className="grid grid-cols-1 sm:grid-cols-2">
                        <div className="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                            <dt className="text-sm font-medium leading-6 text-gray-900">Full name</dt>
                            <dd className="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{name}</dd>
                        </div>
                        <div className="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                            <dt className="text-sm font-medium leading-6 text-gray-900">College & Major</dt>
                            <dd className="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{college_choice} - {college_major}</dd>
                        </div>
                        <div className="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                            <dt className="text-sm font-medium leading-6 text-gray-900">Email address</dt>
                            <dd className="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{email}</dd>
                        </div>
                        <div className="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                            <dt className="text-sm font-medium leading-6 text-gray-900">Current School & GPA</dt>
                            <dd className="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{school} - g.p.a {gpa}</dd>
                        </div>
                        <div className="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                            <dt className="text-sm font-medium leading-6 text-gray-900">Sat Status</dt>
                            <dd className="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">Schedulad - {sat_Scheduled}</dd>
                            <dd className="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">Sat Score: <span className="ml-4">{sat_Score}</span></dd>
                        </div>
                        <div className="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                            <dt className="text-sm font-medium leading-6 text-gray-900">ACT Status</dt>
                            <dd className="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">Scheduled - {act_scheduled}</dd>
                            <dd className="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">ACT Score:<span className="ml-4">{act_score}</span></dd>
                        </div>
                        <div className="border-t border-gray-100 px-4 py-6 sm:col-span-2 sm:px-0">
                            <dt className="text-sm font-medium leading-6 text-gray-900">Application Essay</dt>
                            <dd className="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{applicant_essay}</dd>
                        </div>
                        <div className="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                            <dt className="text-sm font-medium leading-6 text-gray-900">Reference 1</dt>
                            <dd className="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">Name:<span className="ml-4">{reference}</span></dd>
                            <dd className="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">Email:<span className="ml-4">{reference_email1}</span></dd>
                            <dd className="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">Relationship:<span className="ml-4">{reference_relationshiip}</span></dd>
                        </div>
                        <div className="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                            <dt className="text-sm font-medium leading-6 text-gray-900">Reference 2</dt>
                            <dd className="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">Name:<span className="ml-4">{reference2}</span></dd>
                            <dd className="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">Email:<span className="ml-4">{reference_email2}</span></dd>
                            <dd className="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">Relationship:<span className="ml-4">{reference_relationshiip2}</span></dd>
                        </div>
                        <div className="border-t border-gray-100 px-4 py-6 sm:col-span-2 sm:px-0">
                            <dt className="text-sm font-medium leading-6 text-gray-900">Attachments</dt>
                            <dd className="mt-2 text-sm text-gray-900">
                            <ul role="list" className="divide-y divide-gray-100 rounded-md border border-gray-200">
                                <li className="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                <div className="flex w-0 flex-1 items-center">
                                    <PaperClipIcon className="h-5 w-5 flex-shrink-0 text-gray-700" aria-hidden="true" />
                                    <div className="ml-4 flex min-w-0 flex-1 gap-2">
                                    <span className="truncate font-medium">Resume</span>
                                    {/* <span className="flex-shrink-0 text-gray-400">2.4mb</span> */}
                                    </div>
                                </div>
                                <div className="ml-4 flex-shrink-0">
                                    <a href={resume_upload} className="font-medium text-indigo-600 hover:text-indigo-500">
                                    Download
                                    </a>
                                </div>
                                </li>
                                <li className="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                <div className="flex w-0 flex-1 items-center">
                                    <PaperClipIcon className="h-5 w-5 flex-shrink-0 text-gray-400" aria-hidden="true" />
                                    <div className="ml-4 flex min-w-0 flex-1 gap-2">
                                    <span className="truncate font-medium">Essay</span>
                                    {/* <span className="flex-shrink-0 text-gray-400">4.5mb</span> */}
                                    </div>
                                </div>
                                <div className="ml-4 flex-shrink-0">
                                    <a href={essay_upload} className="font-medium text-indigo-600 hover:text-indigo-500">
                                    Download
                                    </a>
                                </div>
                                </li>
                                <li className="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                <div className="flex w-0 flex-1 items-center">
                                    <PaperClipIcon className="h-5 w-5 flex-shrink-0 text-gray-400" aria-hidden="true" />
                                    <div className="ml-4 flex min-w-0 flex-1 gap-2">
                                    <span className="truncate font-medium">Additional Information</span>
                                    {/* <span className="flex-shrink-0 text-gray-400">4.5mb</span> */}
                                    </div>
                                </div>
                                <div className="ml-4 flex-shrink-0">
                                    <a href={additional_information_upload} className="font-medium text-indigo-600 hover:text-indigo-500">
                                    Download
                                    </a>
                                </div>
                                </li>
                            </ul>
                            </dd>
                        </div>
                        </dl>
                    </div>
                </>
            ))}
            
        </div>
        
      </div>

    </Authenticated>
  );
}
