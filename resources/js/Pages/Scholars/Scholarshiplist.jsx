import StudentAuthLayout from "@/Layouts/StudentAuthLayout";
import { Head, Link } from "@inertiajs/react";
import { UserCircleIcon, PhotoIcon, CheckBadgeIcon } from "@heroicons/react/24/solid";
import { ViewColumnsIcon } from "@heroicons/react/20/solid";

export default function({auth, scholarship}) {
    return (
        <StudentAuthLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Application</h2>}
            breadcrumb={<span><Link href={route('scholar.dashboard')}>Application</Link></span>} >
            
            <Head title="Application" />
            <div className="w-full px-6 py-6 mx-auto">
            <div className="flex flex-wrap -mx-1">
            <ul role="list" className="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                {scholarship.map((i) => (
                    <li key={i.id} className="col-span-1 divide-y divide-gray-200 rounded-lg bg-white shadow">
                    <div className="flex w-full items-center justify-between space-x-6 p-6">
                        <div className="flex-1 truncate">
                            <div className="flex items-center space-x-3">
                                <h3 className="truncate text-xl font-bold text-gray-900">{i.name}</h3>
                            </div>
                            <p className="mt-1 truncate text-lg text-gray-800">{i.award_payments} per year - deadline <span className="inline-flex flex-shrink-0 items-center rounded-full bg-red-700 px-2 py-0.5 text-base font-medium text-white ring-1 ring-inset ring-green-600/20">
                                {i.deadline}
                                </span>
                            </p>
                            <p className="mt-1 text-wrap line-clamp-2 text-base text-gray-800">{i.description}</p>
                        </div>
                    </div>
                    <div>
                        <div className="-mt-px flex divide-x divide-gray-200">
                        <div className="flex w-0 flex-1">
                            <a
                            href='{`mailto:${i.email}`}'
                            className="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900"
                            >
                            <ViewColumnsIcon aria-hidden="true" className="h-5 w-5 text-gray-400" />
                            View
                            </a>
                        </div>
                        <div className="-ml-px flex w-0 flex-1">
                            <a
                            href='{`tel:${i.telephone}`}'
                            className="relative inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-br-lg border border-transparent py-4 text-sm font-semibold text-gray-900"
                            >
                            <CheckBadgeIcon aria-hidden="true" className="h-5 w-5 text-gray-400" />
                            Apply
                            </a>
                        </div>
                        </div>
                    </div>
                    </li>
                ))}
                </ul>
            </div>
            </div>
        </StudentAuthLayout>
        
      )
}