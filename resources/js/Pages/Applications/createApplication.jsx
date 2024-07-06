import StudentAuthLayout from '@/Layouts/StudentAuthLayout';
import { Head, useForm, Link } from "@inertiajs/react";
import { UserCircleIcon, PhotoIcon } from "@heroicons/react/24/solid";
import { Disclosure } from '@headlessui/react'
import { ChevronUpIcon } from '@heroicons/react/20/solid'

export default function({auth, application}){

    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        email: '',
        streetAddress: '',
        city: '',
        state: '',
        zipCode: '',
        siblings: '',
        siblings_attending_college: '',
        college_choice: '',
        college_major: '',
        college_status: '',
        college_choice2: '',
        college_major2: '',
        college_status2: '',
        college_choice3: '',
        college_major3: '',
        college_status3: '',
        sat_score: '',
        sat_scheduled: '',
        act_score: '',
        act_scheduled: '',
        reference: '',
        reference_email: '',
        reference_relationsship: '',
        reference2: '',
        reference_email2: '',
        reference_relationsship2: '',
        application_essay: '',
        community_service: '',
    });

    const submit = (e) => {
        e.preventDefault();

        post(route('/application/create'));
    };

    return (
        <StudentAuthLayout 
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Application</h2>}
            breadcrumb={<span><Link href={route('scholar.dashboard')}>Application</Link></span>} >
            
            <Head title="Application" />
            <div className="w-full px-6 py-6 mx-auto">
                <div className="flex flex-wrap -mx-1">
                <form>
      <div className="space-y-12">
      {application?.map(({id, name, email,
                        deadline,
                        description,
                        award_payments,
                        additional_information,
                        review_applicants,
                        selection_criteria,
                        requirement_criteria,
                        award_based_on,
                        renewability,
                        uses,
                        fund_amount}) => (
            <>
            <div className="grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 md:grid-cols-3">
                <div>
                    <h2 className="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
                    <p className="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail. <br/>This information will only be shared with Blacks Scholars personnel and Selection Committee</p>
                </div>

                <div className="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
                    <div className="sm:col-span-3">
                    <label htmlFor="name" className="block text-sm font-medium leading-6 text-gray-900">
                        Full name
                    </label>
                    <div className="mt-2">
                        <input
                        type="text"
                        name="name"
                        id="name"
                        autoComplete="name"
                        placeholder={name}
                        className="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        />
                    </div>
                    </div>

                    <div className="sm:col-span-4">
                    <label htmlFor="email" className="block text-sm font-medium leading-6 text-gray-900">
                        Email address
                    </label>
                    <div className="mt-2">
                        <input
                        id="email"
                        name="email"
                        type="email"
                        autoComplete="email"
                        placeholder={email}
                        className="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        />
                    </div>
                    </div>

                    <div className="col-span-full">
                    <label htmlFor="streetAddress" className="block text-sm font-medium leading-6 text-gray-900">
                        Street address
                    </label>
                    <div className="mt-2">
                        <input
                        type="text"
                        name="streetAddress"
                        id="streetAddress"
                        autoComplete="streetAddress"
                        className="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        />
                    </div>
                    </div>

                    <div className="sm:col-span-2 sm:col-start-1">
                    <label htmlFor="city" className="block text-sm font-medium leading-6 text-gray-900">
                        City
                    </label>
                    <div className="mt-2">
                        <input
                        type="text"
                        name="city"
                        id="city"
                        autoComplete="address-level2"
                        className="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        />
                    </div>
                    </div>

                    <div className="sm:col-span-2">
                    <label htmlFor="state" className="block text-sm font-medium leading-6 text-gray-900">
                        State / Province
                    </label>
                    <div className="mt-2">
                        <input
                        type="text"
                        name="state"
                        id="state"
                        autoComplete="address-level1"
                        className="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        />
                    </div>
                    </div>

                    <div className="sm:col-span-2">
                    <label htmlFor="zipCode" className="block text-sm font-medium leading-6 text-gray-900">
                        ZIP / Postal code
                    </label>
                    <div className="mt-2">
                        <input
                        type="text"
                        name="zipCode"
                        id="zipCode"
                        autoComplete="zipCode"
                        className="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        />
                    </div>
                    </div>

                    <div className="sm:col-span-3">
                        <label htmlFor="siblings" className="block text-sm font-medium leading-6 text-gray-900">
                            Any Siblings
                        </label>
                        <div className="mt-2">
                            <input
                            type="text"
                            name="siblings"
                            id="siblings"
                            autoComplete="siblings"
                            className="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>
                    
                    <div className="sm:col-span-3">
                        <label htmlFor="siblings_attending_college" className="block text-sm font-medium leading-6 text-gray-900">
                            Number of Siblings Attending College?
                        </label>
                        <div className="mt-2">
                            <input
                            type="text"
                            name="siblings_attending_college"
                            id="siblings_attending_college"
                            className="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>


                </div>
            </div>
            {/* Second Section */}
            <div className="grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 md:grid-cols-3">
                <div>
                    <h2 className="text-base font-semibold leading-7 text-gray-900">College Choices & SAT Scores</h2>
                    <p className="mt-1 text-sm leading-6 text-gray-600">
                    Lets input your education level and or college choice
                    </p>
                </div>
                
                <div className="max-w-2xl p-2 col-span-2">
                    <Disclosure>
                    {({ open }) => (
                        <>
                        <Disclosure.Button className="flex w-full justify-between rounded-lg bg-red-100 px-4 py-2 text-left text-md font-medium text-gray-900 hover:bg-red-200 focus:outline-none focus-visible:ring focus-visible:ring-red-300/75">
                            <span>First college choice</span>
                            <ChevronUpIcon
                            className={`${
                                open ? 'rotate-180 transform' : ''
                            } h-5 w-5 text-purple-500`}
                            />
                        </Disclosure.Button>
                        <Disclosure.Panel className="px-4 pb-2 pt-4 text-sm text-gray-500">
                        <div className="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
                                <div className="col-span-3">
                                    <label htmlFor="college_choice" className="block text-sm font-medium leading-6 text-gray-900">
                                        College Name
                                    </label>
                                    <div className="mt-2">
                                        <input
                                        type="text"
                                        name="college_choice"
                                        id="college_choice"
                                        autoComplete="given-name"
                                        className="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        />
                                    </div>
                                </div>

                                <div className="col-span-3">
                                    <label htmlFor="college_major" className="block text-sm font-medium leading-6 text-gray-900">
                                        College Major
                                    </label>
                                    <div className="mt-2">
                                        <input
                                        type="text"
                                        name="college_major"
                                        id="college_major"
                                        className="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        />
                                    </div>
                                </div>
                                <div className="col-span-6">
                                    <label htmlFor="college_status" className="block text-sm font-medium leading-6 text-gray-900">
                                        Current Admission Status
                                    </label>
                                    <select
                                        id="location"
                                        name="location"
                                        className="h-35 mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        defaultValue="Canada"
                                    >
                                        <option>Not Started</option>
                                        <option>Pending</option>
                                        <option>Accepted</option>
                                        <option>Decline</option>
                                    </select>
                                </div>
                        </div>
                        </Disclosure.Panel>
                        </>
                    )}
                    </Disclosure>
                    <Disclosure as="div" className="mt-2">
                    {({ open }) => (
                        <>
                        <Disclosure.Button className="flex w-full justify-between rounded-lg bg-red-100 px-4 py-2 text-left text-md font-medium text-gray-900 hover:bg-red-200 focus:outline-none focus-visible:ring focus-visible:ring-red-300/75">
                            <span>Second college choice</span>
                            <ChevronUpIcon
                            className={`${
                                open ? 'rotate-180 transform' : ''
                            } h-5 w-5 text-slate-700`}
                            />
                        </Disclosure.Button>
                        <Disclosure.Panel className="px-4 pb-2 pt-4 text-sm text-slate-800">
                        <div className="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
                                <div className="col-span-3">
                                    <label htmlFor="first-name" className="block text-sm font-medium leading-6 text-gray-900">
                                        College Name
                                    </label>
                                    <div className="mt-2">
                                        <input
                                        type="text"
                                        name="first-name"
                                        id="first-name"
                                        autoComplete="given-name"
                                        className="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        />
                                    </div>
                                </div>

                                <div className="col-span-3">
                                    <label htmlFor="first-name" className="block text-sm font-medium leading-6 text-gray-900">
                                        College Major
                                    </label>
                                    <div className="mt-2">
                                        <input
                                        type="text"
                                        name="first-name"
                                        id="first-name"
                                        autoComplete="given-name"
                                        className="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        />
                                    </div>
                                </div>
                                <div className="col-span-6">
                                    <label htmlFor="first-name" className="block text-sm font-medium leading-6 text-gray-900">
                                        Current Admission Status
                                    </label>
                                    <select
                                        id="location"
                                        name="location"
                                        className="h-35 mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        defaultValue="Canada"
                                    >
                                        <option>Not Started</option>
                                        <option>Pending</option>
                                        <option>Accepted</option>
                                        <option>Decline</option>
                                    </select>
                                </div>
                        </div>
                        </Disclosure.Panel>
                        </>
                    )}
                    </Disclosure>

                    <Disclosure as="div" className="mt-2">
                    {({ open }) => (
                        <>
                        <Disclosure.Button className="flex w-full justify-between rounded-lg bg-red-100 px-4 py-2 text-left text-md font-medium text-gray-900 hover:bg-red-200 focus:outline-none focus-visible:ring focus-visible:ring-red-300/75">
                            <span>Third Choice college choice</span>
                            <ChevronUpIcon
                            className={`${
                                open ? 'rotate-180 transform' : ''
                            } h-5 w-5 text-slate-700`}
                            />
                        </Disclosure.Button>
                        <Disclosure.Panel className="px-4 pb-2 pt-4 text-sm text-slate-800">
                        <div className="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
                                <div className="col-span-3">
                                    <label htmlFor="first-name" className="block text-sm font-medium leading-6 text-gray-900">
                                        College Name
                                    </label>
                                    <div className="mt-2">
                                        <input
                                        type="text"
                                        name="first-name"
                                        id="first-name"
                                        autoComplete="given-name"
                                        className="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        />
                                    </div>
                                </div>

                                <div className="col-span-3">
                                    <label htmlFor="first-name" className="block text-sm font-medium leading-6 text-gray-900">
                                        College Major
                                    </label>
                                    <div className="mt-2">
                                        <input
                                        type="text"
                                        name="first-name"
                                        id="first-name"
                                        autoComplete="given-name"
                                        className="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        />
                                    </div>
                                </div>
                                <div className="col-span-6">
                                    <label htmlFor="first-name" className="block text-sm font-medium leading-6 text-gray-900">
                                        Current Admission Status
                                    </label>
                                    <select
                                        id="location"
                                        name="location"
                                        className="h-35 mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        defaultValue="Canada"
                                    >
                                        <option>Not Started</option>
                                        <option>Pending</option>
                                        <option>Accepted</option>
                                        <option>Decline</option>
                                    </select>
                                </div>
                        </div>
                        </Disclosure.Panel>
                        </>
                    )}
                    </Disclosure>

                    <div className="mt-8 grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">

                        <div className="sm:col-span-3">
                        <label htmlFor="sat_score" className="block text-sm font-medium leading-6 text-gray-900">
                            Sat Score
                        </label>
                        <div className="mt-2">
                            <input
                            type="text"
                            name="sat_score"
                            id="sat_score"
                            className="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                        </div>

                        <div className="sm:col-span-3">
                        <label htmlFor="sat_scheduled" className="block text-sm font-medium leading-6 text-gray-900">
                            Sat Schedule Date
                        </label>
                        <div className="mt-2">
                            <input
                            type="text"
                            name="sat_scheduled"
                            id="sat_scheduled"
                            className="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                        </div>

                        <div className="sm:col-span-3">
                        <label htmlFor="act_score" className="block text-sm font-medium leading-6 text-gray-900">
                            Act Score
                        </label>
                        <div className="mt-2">
                            <input
                            type="text"
                            name="act_score"
                            id="act_score"
                            className="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                        </div>

                        <div className="sm:col-span-3">
                        <label htmlFor="act_scheduled" className="block text-sm font-medium leading-6 text-gray-900">
                            Act Schedule Date
                        </label>
                        <div className="mt-2">
                            <input
                            type="text"
                            name="act_scheduled"
                            id="act_scheduled"
                            className="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                        </div>
                    </div>
                </div>
        
               
            </div>
            {/* Third Section */}
            <div className="grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 md:grid-cols-3">
                    <div>
                        <h2 className="text-base font-semibold leading-7 text-gray-900">Referenece Information</h2>
                        <p className="mt-1 text-sm leading-6 text-gray-600">
                        
                        </p>
                    </div>
                    <div className="max-w-2xl space-y-10 md:col-span-2">
                        
                        <Disclosure>
                        {({ open }) => (
                            <>
                            <Disclosure.Button className="flex w-full justify-between rounded-lg bg-red-100 px-4 py-2 text-left text-md font-medium text-gray-900 hover:bg-red-200 focus:outline-none focus-visible:ring focus-visible:ring-red-300/75">
                                <span>First Reference</span>
                                <ChevronUpIcon
                                className={`${
                                    open ? 'rotate-180 transform' : ''
                                } h-5 w-5 text-purple-500`}
                                />
                            </Disclosure.Button>
                            <Disclosure.Panel className="px-4 pb-2 pt-4 text-sm text-gray-500">
                            <div className="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
                                    <div className="col-span-3">
                                        <label htmlFor="reference" className="block text-sm font-medium leading-6 text-gray-900">
                                            Reference Name
                                        </label>
                                        <div className="mt-2">
                                            <input
                                            type="text"
                                            name="reference"
                                            id="reference"
                                            className="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            />
                                        </div>
                                    </div>

                                    <div className="col-span-3">
                                        <label htmlFor="reference_email" className="block text-sm font-medium leading-6 text-gray-900">
                                            Reference Email
                                        </label>
                                        <div className="mt-2">
                                            <input
                                            type="text"
                                            name="reference_email"
                                            id="reference_email"
                                            className="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            />
                                        </div>
                                    </div>
                                    <div className="col-span-6">
                                    <label htmlFor="reference_relationsship" className="block text-sm font-medium leading-6 text-gray-900">
                                        How do you know the reference?
                                    </label>
                                    <select
                                        id="reference_relationsship"
                                        name="reference_relationsship"
                                        className="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        defaultValue="Employer"
                                    >
                                        <option>Teacher\Counsoler</option>
                                        <option>Pastor</option>
                                        <option>Employer</option>
                                        <option>Family Friend</option>
                                        <option>Other</option>
                                    </select>
                                    </div>
                            </div>
                            </Disclosure.Panel>
                            </>
                        )}
                        </Disclosure>
                        
                        </div>
            </div>

            {/* Forth Section */}
            <div className="grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 md:grid-cols-3">
                    <div>
                        <h2 className="text-base font-semibold leading-7 text-gray-900">Addtional Information Information</h2>
                        <p className="mt-1 text-sm leading-6 text-gray-600">
                        
                        </p>
                    </div>

                    <div className="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">

                        <div className="col-span-full">
                        <label htmlFor="about" className="block text-sm font-medium leading-6 text-gray-900">
                            Short Essay
                        </label>
                        <div className="mt-2">
                            <textarea
                            id="about"
                            name="about"
                            rows={10}
                            className="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            defaultValue={''}
                            />
                        </div>
                        <p className="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about yourself.</p>
                        </div>

                        <div className="col-span-full">
                        <label htmlFor="about" className="block text-sm font-medium leading-6 text-gray-900">
                            Community Service List
                        </label>
                        <div className="mt-2">
                            <textarea
                            id="about"
                            name="about"
                            rows={10}
                            className="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            defaultValue={''}
                            />
                        </div>
                            <p className="mt-3 text-sm leading-6 text-gray-600">List your communinity Service ex(Company name, Jobtile, date,</p>
                        </div>

                        
                    </div>
                
            </div>
            </>
        ))}
      </div>

      <div className="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" className="text-sm font-semibold leading-6 text-gray-900">
          Cancel
        </button>
        <button
          href={submit}
          type="submit"
          className="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
        >
          Submit
        </button>
      </div>
    </form>
                </div>
            </div>
        </StudentAuthLayout>
    );
}