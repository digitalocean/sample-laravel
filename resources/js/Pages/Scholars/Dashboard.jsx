import React, {Fragment} from 'react';
import StudentAuthLayout from '@/Layouts/StudentAuthLayout';
import { usePage } from '@inertiajs/react';
import { Collections } from '@mui/icons-material';
import { PlusIcon } from '@heroicons/react/20/solid';
import {Tab} from '@headlessui/react';
import { Menu, Transition } from '@headlessui/react'
import { EllipsisHorizontalIcon } from '@heroicons/react/20/solid'

function classNames(...classes) {
    return classes.filter(Boolean).join('')
}

export default function Dashboard({ auth }) {
    // const {scholarships, totalApplications} = usePage().props;
    const {scholar} = usePage().props;
    const {scholarships} = usePage().props;

    // const totalScholarshipamount = scholarships.reduce((a, c) => a + c.fund_amount, 0);

    const secondaryNavigation = [
        { name: 'Account', current: true },
        { name: 'Application', current: false },
        { name: 'Scholarship Submission', current: false },
      ]

    const statuses = {
        Pending: 'text-green-700 bg-green-50 ring-green-600/20',
        Approved: 'text-gray-600 bg-gray-50 ring-gray-500/10',
        Selected: 'text-red-700 bg-red-50 ring-red-600/10',
    }
    
      

    return (
        <StudentAuthLayout>
       
        <Tab.Group>
            <header className="border-b border-gray/5">
            <Tab.List className="flex space-x-1 mt-4 mx-4 py-4">
                
                {secondaryNavigation.map((item) => (
                    <Tab 
                    key={item.name} 
                    className={({ selected }) =>
                            classNames(
                            'w-1/3 rounded-lg py-2.5 text-sm text-gray-800 font-medium leading-5',
                            'ring-white/60 ring-offset-2 ring-offset-red-400 focus:outline-none focus:ring-2',
                            selected
                                ? 'bg-red-800 border-2 border-red-800 text-red-800 shadow'
                                : 'text-gray-800 hover:bg-red/[0.12] hover:text-red-700'
                            )
                        } 
                    >
                        {item.name}

                    </Tab>
                  
                ))}
            </Tab.List>
            </header>

            {/* Settings forms */}
            
            <div className="">
            <Tab.Panels>
            {scholar.map(({id, name, parent_name, parent_email, email, phone, school, gpa, graduation_year, submitted_on, college_major, college_choice, college_choice2}) => (
                 <>
                <Tab.Panel>
                    <div className="grid max-w-ful grid-cols-1 gap-x-12 gap-y-10 px-4 py-16 sm:px-6 md:grid-cols-3 lg:px-8 border-b-2 border-b-slate-200">
                            
                            <div key={id}>
                                <h2 className="text-base font-semibold leading-7 text-gray-700">Profile Information</h2>
                                <p className="mt-1 text-sm leading-6 text-gray-600">
                                    Use a permanent address where you can receive mail.
                                </p>
                            </div>

                            <div className="md:col-span-2">
                                <div className="grid grid-cols-1 gap-x-6 gap-y-4 sm:max-w-xl sm:grid-cols-6">
                                    {/* <div className="col-span-full flex items-center gap-x-8">
                                        <img
                                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt=""
                                            className="h-24 w-24 flex-none rounded-lg bg-gray-800 object-cover"
                                        />
                                        <div>
                                            <button
                                            type="button"
                                            className="rounded-md bg-white/10 px-3 py-2 text-sm font-semibold text-gray-700 shadow-sm hover:bg-white/20"
                                            >
                                            Change avatar
                                            </button>
                                            <p className="mt-2 text-xs leading-5 text-gray-600">JPG, GIF or PNG. 1MB max.</p>
                                        </div>
                                    </div> */}

                                    <div className="sm:col-span-3">
                                        <h2 className="text-base font-semibold leading-1 text-gray-700">Full Name</h2>
                                        <p className="mt-1 text-sm leading-6 text-gray-600">
                                            {name}
                                        </p>
                                
                                    </div>

                                    <div className="sm:col-span-3">
                                    <h2 className="text-base font-semibold leading-1 text-gray-700">Contact Email</h2>
                                        <p className="mt-1 text-sm leading-6 text-gray-600">
                                            {email}
                                        </p>
                                    </div>

                                    <div className="sm:col-span-3">
                                        <h2 className="text-base font-semibold leading-1 text-gray-700">Paent Name</h2>
                                        <p className="mt-1 text-sm leading-6 text-gray-600">
                                            {parent_name}
                                        </p>
                                
                                    </div>

                                    <div className="sm:col-span-3">
                                        <h2 className="text-base font-semibold leading-1 text-gray-700">Paent email</h2>
                                        <p className="mt-1 text-sm leading-6 text-gray-600">
                                            {parent_email}
                                        </p>
                                
                                    </div>

                                    <div className="sm:col-span-2">
                                    <h2 className="text-base font-semibold leading-1 text-gray-700">Current School</h2>
                                        <p className="mt-1 text-sm leading-6 text-gray-600">
                                            {school}
                                        </p>
                                    </div>

                                    <div className="sm:col-span-1">
                                        <h2 className="text-base font-semibold leading-1 text-gray-700">GPA</h2>
                                        <p className="mt-1 text-sm leading-6 text-gray-600">
                                            {gpa}
                                        </p>
                                
                                    </div>
                                    <div className="sm:col-span-1">
                                        <h2 className="text-base font-semibold leading-1 text-gray-700">Graduation</h2>
                                        <p className="mt-1 text-sm leading-6 text-gray-600">
                                            {graduation_year}
                                        </p>
                                
                                    </div>

                                    <div className="sm:col-span-2">
                                    <h2 className="text-base font-semibold leading-1 text-gray-700">Phone</h2>
                                        <p className="mt-1 text-sm leading-6 text-gray-600">
                                            {phone}
                                        </p>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div className="grid max-w-7xl grid-cols-1 gap-x-8 gap-y-10 px-4 py-16 sm:px-6 md:grid-cols-3 lg:px-8">
                            <div>
                            <h2 className="text-base font-semibold leading-7 text-gray-700">Application Summary</h2>
                            <p className="mt-1 text-sm leading-6 text-gray-600">
                                This is where we summarize your common application with links you have uploaded to complete application
                            </p>
                            </div>
                            
                            <div className="md:col-span-2 h-sidenav">
                                {scholarships === 'null' 
                                    ? <div className="grid grid-cols-1 gap-x-6 gap-y-8 sm:max-w-xl sm:grid-cols-6">
                                            <div className="col-span-3">
                                                <h2 className="text-base font-semibold leading-1 text-gray-700">Application Submitted on</h2>
                                                <p className="mt-1 text-sm leading-6 text-gray-600">
                                                    {submitted_on}
                                                </p>
                                            </div>

                                            <div className="col-span-3">
                                                <h2 className="text-base font-semibold leading-1 text-gray-700">College Major</h2>
                                                <p className="mt-1 text-sm leading-6 text-gray-600">
                                                    {college_major}
                                                </p>
                                            </div>

                                            <div className="col-span-3">
                                                <h2 className="text-base font-semibold leading-1 text-gray-700">College choice</h2>
                                                <p className="mt-1 text-sm leading-6 text-gray-600">
                                                    {college_choice}
                                                </p>
                                            </div>

                                            <div className="col-span-3">
                                                <h2 className="text-base font-semibold leading-1 text-gray-700">Second college choice</h2>
                                                <p className="mt-1 text-sm leading-6 text-gray-600">
                                                    {college_choice2}
                                                </p>
                                            </div>
                                        </div> 

                                    : <div className="text-center">
                                            <svg
                                                className="mx-auto h-12 w-12 text-gray-400"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                aria-hidden="true"
                                            >
                                                <path
                                                vectorEffect="non-scaling-stroke"
                                                strokeLinecap="round"
                                                strokeLinejoin="round"
                                                strokeWidth={2}
                                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"
                                                />
                                            </svg>
                                            <h3 className="mt-2 text-sm font-semibold text-gray-900">No commom Scholarship Application or Uploads</h3>
                                            <p className="mt-1 text-sm text-gray-600">Get started by creating a new common scholarship application.</p>
                                            <div className="mt-6">
                                                <button
                                                type="button"
                                                className="inline-flex items-center rounded-md bg-red-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                                >
                                                <PlusIcon className="-ml-0.5 mr-1.5 h-5 w-5" aria-hidden="true" />
                                                    New Common Application
                                                </button>
                                            </div>
                                        </div>

                                }
                            

                            </div>
                    </div>
                </Tab.Panel>
                
                <Tab.Panel>
                    <div className="grid max-w-7xl grid-cols-1 gap-x-8 gap-y-10 px-4 py-16 sm:px-6 md:grid-cols-3 lg:px-8">
                        <div>
                        <h2 className="text-base font-semibold leading-7 text-gray-700">Full Application</h2>
                        <p className="mt-1 text-sm leading-6 text-gray-600">
                            This is where you review your common application with links you have uploaded to complete the application.
                        </p>
                        </div>
                        
                        <div className="md:col-span-2 h-sidenav">
                            {submitted_on === 'null' 
                                ? <div className="grid grid-cols-1 gap-x-6 gap-y-8 sm:max-w-xl sm:grid-cols-6">
                                        <div className="col-span-3">
                                            <h2 className="text-base font-semibold leading-1 text-gray-700">Application Submitted on</h2>
                                            <p className="mt-1 text-sm leading-6 text-gray-600">
                                                {submitted_on}
                                            </p>
                                        </div>

                                        <div className="col-span-3">
                                            <h2 className="text-base font-semibold leading-1 text-gray-700">College Major</h2>
                                            <p className="mt-1 text-sm leading-6 text-gray-600">
                                                {college_major}
                                            </p>
                                        </div>

                                        <div className="col-span-3">
                                            <h2 className="text-base font-semibold leading-1 text-gray-700">College choice</h2>
                                            <p className="mt-1 text-sm leading-6 text-gray-600">
                                                {college_choice}
                                            </p>
                                        </div>

                                        <div className="col-span-3">
                                            <h2 className="text-base font-semibold leading-1 text-gray-700">Second college choice</h2>
                                            <p className="mt-1 text-sm leading-6 text-gray-600">
                                                {college_choice2}
                                            </p>
                                        </div>
                                    </div> 

                                : <div className="text-center">
                                        <svg
                                            className="mx-auto h-12 w-12 text-gray-400"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            aria-hidden="true"
                                        >
                                            <path
                                            vectorEffect="non-scaling-stroke"
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                            strokeWidth={2}
                                            d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"
                                            />
                                        </svg>
                                        <h3 className="mt-2 text-sm font-semibold text-gray-900">No commom Scholarship Application or Uploads</h3>
                                        <p className="mt-1 text-sm text-gray-500">Get started by creating a new common scholarship application.</p>
                                        <div className="mt-6">
                                        <a href={route('scholar.application')}>
                                            <button
                                            type="button"
                                            className="inline-flex items-center rounded-md bg-red-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                            >
                                            <PlusIcon className="-ml-0.5 mr-1.5 h-5 w-5" aria-hidden="true" />
                                                New Commom Application
                                            </button>
                                        </a>
                                        </div>
                                    </div>

                            }
                        

                        </div>
                    </div>
                
                </Tab.Panel>
                </>
            ))}  

            
                <Tab.Panel>

                    <div className="grid max-w-7xl grid-cols-1 gap-x-8 gap-y-10 px-4 py-16 sm:px-6 md:grid-cols-3 lg:px-8">
                        <div>
                            <h2 className="text-base font-semibold leading-7 text-gray-700">ScholarShip Submission</h2>
                            <p className="mt-1 text-sm leading-6 text-gray-600">
                                This is where you review your list of scholarships you applied to and the response.
                            </p>
                        </div>
                        <div className='md:col-span-2 h-sidenav'>
                            <ul role="list" className="grid grid-cols-1 gap-x-6 gap-y-8 lg:grid-cols-2 xl:gap-x-8">
                            {scholarships.map(({id, name, deadline, award_payments, }) => (
                            <>
                                <li key={id} className="overflow-hidden rounded-xl border border-gray-200">
                                <div className="flex items-center gap-x-4 border-b border-gray-900/5 bg-gray-50 p-6">
                                    <img
                                    // src={client.imageUrl}
                                    alt={name}
                                    className="h-12 w-12 flex-none rounded-lg bg-white object-cover ring-1 ring-gray-900/10"
                                    />
                                    <div className="text-sm font-medium leading-6 text-gray-900">{name}</div>
                                    <Menu as="div" className="relative ml-auto">
                                    <Menu.Button className="-m-2.5 block p-2.5 text-gray-400 hover:text-gray-500">
                                        <span className="sr-only">Open options</span>
                                        <EllipsisHorizontalIcon className="h-5 w-5" aria-hidden="true" />
                                    </Menu.Button>
                                    <Transition
                                        as={Fragment}
                                        enter="transition ease-out duration-100"
                                        enterFrom="transform opacity-0 scale-95"
                                        enterTo="transform opacity-100 scale-100"
                                        leave="transition ease-in duration-75"
                                        leaveFrom="transform opacity-100 scale-100"
                                        leaveTo="transform opacity-0 scale-95"
                                    >
                                        <Menu.Items className="absolute right-0 z-10 mt-0.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none">
                                        <Menu.Item>
                                            {({ active }) => (
                                            <a
                                                href="#"
                                                className={classNames(
                                                active ? 'bg-gray-50' : '',
                                                'block px-3 py-1 text-sm leading-6 text-gray-900'
                                                )}
                                            >
                                                View
                                            </a>
                                            )}
                                        </Menu.Item>
                                        </Menu.Items>
                                    </Transition>
                                    </Menu>
                                </div>
                                <dl className="-my-3 divide-y divide-gray-100 px-6 py-4 text-sm leading-6">
                                    <div className="flex justify-between gap-x-4 py-3">
                                    <dt className="text-gray-600">Deadline</dt>
                                    <dd className="text-gray-700">
                                        <time dateTime={deadline}>{deadline}</time>
                                    </dd>
                                    </div>
                                    <div className="flex justify-between gap-x-4 py-3">
                                    <dt className="text-gray-600">Award Amount</dt>
                                    <dd className="flex items-start gap-x-2">
                                        <div className="font-medium text-gray-900">{award_payments}</div>
                                        <div
                                        className={classNames(
                                            'rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20'
                                        )}
                                        >
                                            Pending
                                        </div>
                                    </dd>
                                    </div>
                                </dl>
                                </li>
                                </>
                            ))} 
                            </ul>
                        </div>

                                
                        
                    </div>
                </Tab.Panel>
             
            </Tab.Panels>
            
                

                
               
            </div>
         </Tab.Group>
        </StudentAuthLayout>
    );
}
