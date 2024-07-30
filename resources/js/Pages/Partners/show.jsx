import React, { Fragment } from 'react';
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Head, usePage, Link } from "@inertiajs/react";
import Create from "@/Pages/Partners/create"
import { Menu, Transition } from '@headlessui/react'
import { EllipsisVerticalIcon } from '@heroicons/react/20/solid'


export default function Show({auth}) {
  const {viewpartner} = usePage().props;
  const {scholarshipassociated} = usePage().props;
  const {associatedUser} = usePage().props;

  function classNames(...classes) {
    return classes.filter(Boolean).join(' ')
  }

  return (
    <Authenticated
      user={auth.user}
      header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Partner Information</h2>}
      breadcrumb={<span><Link href={route('partner.list')}>Partner list</Link></span>} >
      
      <Head title="Scholarships" />

      <div className="w-full px-6 py-6 mx-auto">
        <div class="flex flex-nowrap px-3">
            <div class="sm:w-4/6 max-w-full p-6 lg-max:mt-6">
              <div className="relative flex items-center -mt-6 overflow-hidden bg-center bg-cover min-h-75 rounded-2xl bg-gray-200">
                <span className="absolute inset-y-0 w-full h-full bg-center bg-cover bg-gradient-to-br from-red-800 to-red-700 opacity-80"></span>
              </div>
              <div className="relative flex flex-auto min-w-0 p-4 mx-6 -mt-16 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
                {viewpartner.map(({id, organization_name, contact_name, email, phone, address, consent}) => (
                  <>
                  <div className="flex flex-wrap -mx-3" key={id}>
                    <div className="flex-none w-auto max-w-full px-3">
                      <div className="text-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
                        <img src="../assets/img/bruce-mars.jpg" alt="profile_image" className="w-full shadow-soft-sm rounded-xl" />
                      </div>
                    </div>
                    <div className="flex-none w-auto max-w-full px-3 my-auto">
                      <div className="h-full">
                        <h5 className="mb-1">{organization_name} / {contact_name}</h5>
                        <p className="mb-0 font-semibold leading-normal text-base">Email:{email} <span className="ml-2">Phone:{phone}</span></p>
                      </div>
                    </div>
                    <div className="w-full max-w-full px-3 mx-auto mt-4 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
                      <div className="relative right-0">
                        <ul className="relative flex flex-wrap p-1 list-none bg-transparent rounded-xl" nav-pills role="tablist">
                          {/* <li className="z-30 flex-auto text-center">
                            <a className="z-30 block w-full px-0 py-1 mb-0 transition-all border-0 rounded-lg ease-soft-in-out bg-inherit text-slate-700" nav-link href="javascript:;" role="tab" aria-selected="false">
                              <svg className="text-slate-700" width="16px" height="16px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>document</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                  <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                      <g transform="translate(154.000000, 300.000000)">
                                        <path className="fill-slate-800" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                                        <path className="fill-slate-800" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </svg>
                              <span className="ml-1">Messages</span>
                            </a>
                          </li> */}
                          {/* <li className="z-30 flex-auto text-center">
                            <a className="z-30 block w-full px-0 py-1 mb-0 transition-colors border-0 rounded-lg ease-soft-in-out bg-inherit text-slate-700" nav-link href="javascript:;" role="tab" aria-selected="false">
                              <svg className="text-slate-700" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>settings</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                  <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                      <g transform="translate(304.000000, 151.000000)">
                                        <polygon className="fill-slate-800" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667"></polygon>
                                        <path className="fill-slate-800" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
                                        <path className="fill-slate-800" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z"></path>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </svg>
                              <span className="ml-1">Award Scholarship Amount</span>
                            </a>
                          </li> */}
                        </ul>
                      </div>
                    </div>
                  </div>
                  </>
                ))}
              </div>
              
            </div>
            <div class="sm:w-2/6 pl-4">
              <div className="flex max-w-full p-6 bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                <div className="sm:flex-auto">
                  <h1 className="text-base font-semibold leading-6 text-gray-900">Partner Personnel</h1>
                  <p className="mt-2 text-base text-gray-700">List of users associated with partner for contacting</p>
                    <ul role="list" className="divide-y divide-gray-100">
                      {associatedUser?.map((person) => (
                        <li key={person.email} className="flex justify-between gap-x-2 py-2">
                          <div className="flex min-w-0 gap-x-4">
                            <img className="h-6 w-6 flex-none rounded-full bg-gray-50" src={person.imageUrl} alt="" />
                            <div className="min-w-0 flex-auto">
                              <p className="text-base font-semibold leading-normal text-gray-900">
                                <a href={person.href} className="hover:underline">
                                  {person.name}
                                </a>
                                <br/>
                                <span className="mt-1 flex text-sm leading-normal text-gray-800">
                                  <a href={`mailto:${person.email}`} className="truncate hover:underline">
                                    {person.email}
                                  </a>
                                </span>
                              </p>
                          
                            </div>
                          </div>
                          <div className="flex shrink-0 items-center gap-x-2">
                            <div className="hidden sm:flex sm:flex-col sm:items-end">
                              {person.lastSeen ? (
                                <p className="mt-1 text-xs leading-normal text-gray-500">
                                  Last seen <time dateTime={person.lastSeenDateTime}>{person.lastSeen}</time>
                                </p>
                              ) : (
                                <div className="flex items-center gap-x-1.5">
                                  <div className="flex-none rounded-full bg-emerald-500/20 p-1">
                                    <div className="h-1.5 w-1.5 rounded-full bg-emerald-500" />
                                  </div>
                                  <p className="text-xs leading-normal text-gray-500">Online</p>
                                </div>
                              )}
                            </div>
                            <Menu as="div" className="relative flex-none">
                              <Menu.Button className="-m-2.5 block p-2.5 text-gray-500 hover:text-gray-900">
                                <span className="sr-only">Open options</span>
                                <EllipsisVerticalIcon className="h-5 w-5" aria-hidden="true" />
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
                                <Menu.Items className="absolute right-0 z-10 mt-2 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none">
                                  <Menu.Item>
                                    {({ active }) => (
                                      <a
                                        href="#"
                                        className={classNames(
                                          active ? 'bg-gray-50' : '',
                                          'block px-3 py-1 text-base leading-6 text-gray-900'
                                        )}
                                      >
                                        {/* add modal delete user and organization function */}
                                        Delete User<span className="sr-only">, {person.name}</span> 
                                      </a>
                                    )}
                                  </Menu.Item>
                                  {/* <Menu.Item>
                                    {({ active }) => (
                                      <a
                                        href="#"
                                        className={classNames(
                                          active ? 'bg-gray-50' : '',
                                          'block px-3 py-1 text-base leading-6 text-gray-900'
                                        )}
                                      >
                                        Message<span className="sr-only">, {person.name}</span>
                                      </a>
                                    )}
                                  </Menu.Item> */}
                                </Menu.Items>
                              </Transition>
                            </Menu>
                          </div>
                        </li>
                      ))}
                    </ul>
                </div>
              </div>

            </div>
      </div>

      <div class="w-full p-6 mx-auto mb-10">
        <div class="flex flex-wrap -mx-3 px-3">
          <div class="sm:w-full max-w-full p-6 lg-max:mt-6 bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
            <div className="sm:flex sm:items-center">
              <div className="sm:flex-auto">
                <h1 className="text-base font-semibold leading-6 text-gray-900">Scholarship Funds</h1>
                <p className="mt-2 text-base text-gray-700"></p>
              </div>
              <div className="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <Create />
              </div>
            </div>
            <div className="-mx-4 mt-4 ring-1 ring-gray-300 sm:mx-0 sm:rounded-lg overflow-hidden">
              <table className="min-w-full divide-y divide-gray-300">
                <thead>
                  <tr>
                    <th scope="col" className="py-3.5 pl-4 pr-3 text-left text-base font-semibold text-gray-900 sm:pl-6">
                      Deadline - Scholarship Name
                    </th>
                    <th
                      scope="col"
                      className="hidden px-3 py-3.5 text-left text-base font-semibold text-gray-900 lg:table-cell"
                    >
                      Uses
                    </th>
                    <th
                      scope="col"
                      className="px-3 py-3.5 text-left text-base font-semibold text-gray-900 sm:table-cell"
                    >
                      Award Amount
                    </th>
                    <th 
                      scope="col" 
                      className="hidden px-3 py-3.5 text-left text-base font-semibold text-gray-900 lg:table-cell">
                      Total fund Amount
                    </th>
                    <th scope="col" className="relative py-3.5 pl-3 pr-4 sm:pr-6">
                      <span className="sr-only">View</span>
                    </th>
                  </tr>
                </thead>
                <tbody>
                 {scholarshipassociated.map(({id, partner_id,
                    name,
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
                    fund_amount }) => (
                      <>
                    <tr key={id} className="px-4">
                      <td className="relative py-4 px-3 mr-4 text-base font-medium text-gray-900">
                      {deadline} - {name}
                        <div className="absolute bottom-0 right-full h-px w-screen bg-gray-100" />
                        <div className="absolute bottom-0 left-0 h-px w-screen bg-gray-100" />
                      </td>
                      <td className="hidden px-3 py-4 text-base text-gray-800 sm:table-cell">{award_based_on}</td>
                      <td className="hidden px-3 py-4 text-base text-gray-800 md:table-cell">${fund_amount}</td>
                      <td className="px-3 py-4 text-base text-left text-gray-800">${award_payments}/yr</td>
                      <td className="relative py-4 pl-3 text-right text-sm font-medium">
                        <a href={route('scholarship.show', id)} className="text-base text-indigo-600 hover:text-indigo-900">
                          View<span className="sr-only">, {name}</span>
                        </a>
                        <a href={route('scholarship.delete', id)} className="px-4 text-red-900 hover:text-indigo-900 text-base">
                          Delete<span className="sr-only">, {name}</span>
                        </a>
                      </td>
                    </tr>
                    </>
                  ))}
                </tbody>
              </table>
            </div>

          </div>

        </div>
      </div>
      </div>
        
    
    </Authenticated>
  )
}