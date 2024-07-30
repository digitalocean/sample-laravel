import React from 'react';
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Head, usePage, Link } from "@inertiajs/react";
import { Menu } from '@headlessui/react';
import { Fragment } from 'react';
import { ChevronDownIcon } from '@heroicons/react/20/solid'

export default function Scholarship({auth}) {
  const {winners, year} = usePage().props;
  const {data} = year;

//   const totalScholarshipamount = data.reduce((a, c) => a + c.fund_amount, 0);
function classNames(...classes) {
    return classes.filter(Boolean).join(' ')
  }

  return (
    <Authenticated
      user={auth.user}
      header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Select Winners</h2>}
      breadcrumb={<span><Link href={route('dashboard')}>Dashboard</Link></span>} >
      
      <Head title="Selected Winners" />

      <div className="mx-6 mt-6 px-4 sm:px-6 lg:px-8 bg-white rounded-md">
       <div className='p-6'>
        <div className="sm:flex sm:items-center">
            <div className="sm:flex-auto">
            <h1 className="text-xl font-semibold leading-6 text-gray-900">Selected Winners</h1>
            <p className="mt-2 text-base text-gray-700">
                A list of all the winners selected by year.
            </p>
            </div>
            <div className="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <Menu as="div" className="relative inline-block text-left">
                <div>
                    <Menu.Button className="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-red-700 px-6 py-2 text-base font-semibold text-white shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-red-600">
                        Options
                    <ChevronDownIcon aria-hidden="true" className="-mr-1 h-5 w-5 text-gray-400" />
                    </Menu.Button>
                </div>
                <Menu.Items
                    transition
                    className="absolute right-0 z-10 mt-2 w-56 origin-top-left rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 transition focus:outline-none data-[closed]:scale-95 data-[closed]:transform data-[closed]:opacity-0 data-[enter]:duration-100 data-[leave]:duration-75 data-[enter]:ease-out data-[leave]:ease-in">
                    <div className="py-1">
                        {year.map((link) => (
                        /* Use the `active` state to conditionally style the active item. */
                        <Menu.Item key={link.activeYear} as={Fragment}>
                            {({ active }) => (
                            <a
                                href={route('winners.list', link.activeYear)}
                                className={`${
                                active ? 'bg-blue-500 text-white block px-4 py-2 text-base data-[focus]:bg-gray-100 data-[focus]:text-gray-90' : 'block px-4 py-2 text-base text-gray-700 data-[focus]:bg-gray-100 data-[focus]:text-gray-90'
                                }`}
                            >
                                {link.activeYear}
                            </a>
                            )}
                        
                        </Menu.Item>
                        ))}
                    </div>
                </Menu.Items>
            </Menu>
            </div>
        </div>
        <div className="mt-8 flow-root">
            <div className="-mx-4 -my-2 sm:-mx-6 lg:-mx-8">
            <div className="inline-block min-w-full py-2 align-middle">
                <table className="min-w-full border-separate border-spacing-0">
                <thead>
                    <tr>
                    <th
                        scope="col"
                        className="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8"
                    >
                        Name
                    </th>
                    <th
                        scope="col"
                        className="sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:table-cell"
                    >
                        Scholarship
                    </th>
                    <th
                        scope="col"
                        className="sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter lg:table-cell"
                    >
                        Email
                    </th>
                    <th
                        scope="col"
                        className="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter"
                    >
                        Distribuition Date
                    </th>
                    <th
                        scope="col"
                        className="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter"
                    >
                        Award Amount
                    </th>
                    <th
                        scope="col"
                        className="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 py-3.5 pl-3 pr-4 backdrop-blur backdrop-filter sm:pr-6 lg:pr-8"
                    >
                        <span className="sr-only">Edit</span>
                    </th>
                    </tr>
                </thead>
                <tbody>
                    {winners.map((person, personIdx) => (
                    <tr key={person.email}>
                        <td
                        className={classNames(
                            personIdx !== winners.length - 1 ? 'border-b border-gray-200' : '',
                            'whitespace-nowrap py-4 pl-4 pr-3 text-base font-medium text-gray-900 sm:pl-6 lg:pl-8',
                        )}
                        >
                        {person.studentName}
                        </td>
                        <td
                        className={classNames(
                            personIdx !== winners.length - 1 ? 'border-b border-gray-200' : '',
                            'hidden whitespace-nowrap px-3 py-4 text-base text-gray-700 sm:table-cell',
                        )}
                        >
                        {person.scholarshipName}
                        </td>
                        <td
                        className={classNames(
                            personIdx !== winners.length - 1 ? 'border-b border-gray-200' : '',
                            'hidden whitespace-nowrap px-3 py-4 text-base text-gray-700 lg:table-cell',
                        )}
                        >
                        {person.studentEmail}
                        </td>
                        <td
                        className={classNames(
                            personIdx !== winners.length - 1 ? 'border-b border-gray-200' : '',
                            'whitespace-nowrap px-3 py-4 text-base text-gray-700',
                        )}
                        >
                        {person.distributionDate}
                        </td>
                        <td
                        className={classNames(
                            personIdx !== winners.length - 1 ? 'border-b border-gray-200' : '',
                            'whitespace-nowrap px-3 py-4 text-base text-gray-700',
                        )}
                        >
                        ${person.award_payments} - {person.frequnecy}
                        </td>
                        <td
                        className={classNames(
                            personIdx !== winners.length - 1 ? 'border-b border-gray-200' : '',
                            'relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-base font-medium sm:pr-8 lg:pr-8',
                        )}
                        >
                        <a href={route('scholarship.show', person.scholarship_id)} className="text-indigo-800 hover:text-indigo-900">
                            View Scholarship<span className="sr-only">, {person.studentName}</span>
                        </a>
                        </td>
                    </tr>
                    ))}
                </tbody>
                </table>
            </div>
            </div>
        </div>
        
        </div>
      </div>

    </Authenticated>
  );
}