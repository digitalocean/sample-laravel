import StudentAuthLayout from '@/Layouts/StudentAuthLayout';
import { usePage } from '@inertiajs/react';
import React from 'react';

export default function Dashboard({ auth }) {
    // const {scholarships, totalApplications} = usePage().props;
    const {scholar} = usePage().props;

    // const totalScholarshipamount = scholarships.reduce((a, c) => a + c.fund_amount, 0);

    const secondaryNavigation = [
        { name: 'Account', href: '#', current: true },
        { name: 'Application', href: '#', current: false },
        { name: 'Scholarship Submission', href: '#', current: false },
      ]

    return (
        <StudentAuthLayout>

            <header className="border-b border-white/5">
            {/* Secondary navigation */}
            <nav className="flex overflow-x-auto py-4">
                <ul
                role="list"
                className="flex min-w-full flex-none gap-x-6 px-4 text-sm font-semibold leading-8 text-gray-600 sm:px-6 lg:px-8"
                >
                {secondaryNavigation.map((item) => (
                    <li key={item.name}>
                    <a href={item.href} className={item.current ? 'text-red-700' : ''}>
                        {item.name}
                    </a>
                    </li>
                ))}
                </ul>
            </nav>
            </header>

            {/* Settings forms */}
            
            <div className="divide-y divide-black/5">
            {scholar.map(({id, name, parent_name, parent_email, email, phone, school, gpa, graduation_year}) => (
                 <>
                <div className="grid max-w-7xl grid-cols-1 gap-x-8 gap-y-10 px-4 py-16 sm:px-6 md:grid-cols-3 lg:px-8">
                    
                    
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
                                        {email}
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
                    <h2 className="text-base font-semibold leading-7 text-gray-700">Change password</h2>
                    <p className="mt-1 text-sm leading-6 text-gray-600">
                        Update your password associated with your account.
                    </p>
                    </div>

                    <form className="md:col-span-2">
                    <div className="grid grid-cols-1 gap-x-6 gap-y-8 sm:max-w-xl sm:grid-cols-6">
                        <div className="col-span-full">
                        <label htmlFor="current-password" className="block text-sm font-medium leading-6 text-gray-700">
                            Current password
                        </label>
                        <div className="mt-2">
                            <input
                            id="current-password"
                            name="current_password"
                            type="password"
                            autoComplete="current-password"
                            className="block w-full rounded-md border-0 bg-white/5 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6"
                            />
                        </div>
                        </div>

                        <div className="col-span-full">
                        <label htmlFor="new-password" className="block text-sm font-medium leading-6 text-gray-700">
                            New password
                        </label>
                        <div className="mt-2">
                            <input
                            id="new-password"
                            name="new_password"
                            type="password"
                            autoComplete="new-password"
                            className="block w-full rounded-md border-0 bg-white/5 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6"
                            />
                        </div>
                        </div>

                        <div className="col-span-full">
                        <label htmlFor="confirm-password" className="block text-sm font-medium leading-6 text-gray-700">
                            Confirm password
                        </label>
                        <div className="mt-2">
                            <input
                            id="confirm-password"
                            name="confirm_password"
                            type="password"
                            autoComplete="new-password"
                            className="block w-full rounded-md border-0 bg-white/5 py-1.5 text-gray-700 shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6"
                            />
                        </div>
                        </div>
                    </div>

                    <div className="mt-8 flex">
                        <button
                        type="submit"
                        className="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-gray-700 shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"
                        >
                        Save
                        </button>
                    </div>
                    </form>
                </div>
                </>
            ))}
            </div>
 
        </StudentAuthLayout>
    );
}
