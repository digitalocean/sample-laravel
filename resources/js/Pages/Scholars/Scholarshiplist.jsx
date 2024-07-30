import StudentAuthLayout from "@/Layouts/StudentAuthLayout";
import { Head, Link} from "@inertiajs/react";
import { CheckCircleIcon, XMarkIcon } from '@heroicons/react/20/solid'
import ViewScholarship from "./viewscholarship";

export default function({auth, scholarship, scholarshipInfo,requirements, scholarshipuses, criteria, message}) {

    return (
        <StudentAuthLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Application</h2>}
            breadcrumb={<span><Link href={route('scholar.dashboard')}>Application</Link></span>} >
            
            <Head title="Application" />
                <div className="sm:pl-32 md:pl-96">
                    <div className="xl:pl-32 px-6 py-6">
                        <div className="px-4 py-10 sm:px-6 lg:px-8 lg:py-6">
                            {message === 'true'
                            ? <div className="rounded-md bg-green-50 py-4 px-auto">
                                    <div className="flex">
                                        <div className="flex-shrink-0">
                                        <CheckCircleIcon aria-hidden="true" className="h-5 w-5 text-green-400" />
                                        </div>
                                        <div className="ml-3">
                                        <p className="text-lg font-medium text-green-800">Your information has been sent to the scholarship partner.</p>
                                        </div>
                                        <div className="ml-auto pl-3">
                                        {/* <div className="-mx-1.5 -my-1.5">
                                            <button
                                                type="button"
                                                className="inline-flex rounded-md bg-green-50 p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50"
                                                >
                                                <span className="sr-only">Dismiss</span> 
                                                <XMarkIcon aria-hidden="true" className="h-5 w-5" />
                                            </button>
                                        </div> */}
                                        </div>
                                    </div>
                                </div>
                            : <div></div>
                            }
                            <ViewScholarship scholarshipInfo={scholarshipInfo} requirements={requirements} scholarshipuses={scholarshipuses} criteria={criteria}/>
                
                        </div>
                    </div>
                </div>
                
          
            <aside className="fixed inset-y-0 left-72 hidden w-1/4 overflow-y-auto border-r border-gray-200 px-4 pt-25 pb-6 sm:px-6 lg:px-8 xl:block bg-white">
                <h3 className="mt-4">Available Scholarships</h3>
                 <ul role="list" className="divide-y divide-gray-100">
                 {scholarship.map(({id, name, award_payments, deadline}) => ( 
                        <li key={id} className="flex gap-x-4 py-5">
                        {/* <img alt="" src={person.imageUrl} className="h-12 w-12 flex-none rounded-full bg-gray-50" /> */}
                        <div className="min-w-0">
                            <a href={route('scholar.application.view', {id})} >
                                <p className="text-base font-semibold leading-6 text-gray-900">{name}</p>
                                <p className="truncate text-base leading-5 text-gray-600">Award amout: {award_payments} - Deadline date:{deadline}</p>
                            </a>
                        </div>
                        </li>
                    ))}
                 </ul>
                
            </aside>
        </StudentAuthLayout>
        
      )
}