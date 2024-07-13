import React from "react";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Head, usePage, Link } from "@inertiajs/react";
import { PresentationChartBarIcon, CurrencyDollarIcon } from "@heroicons/react/24/outline";


export default function index({auth}) {
  const {users} = usePage().props;
  // const {data} = users;

  return (
    <Authenticated
      user={auth.user}
      header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">users</h2>}
      breadcrumb={<span><Link href={route('user.index')}>User list</Link></span>} >
      
      <Head title="Users" />

      <div class="w-full px-6 py-6 mx-auto">
          <div class="w-full max-w-full px-3 xl:w-3/3 xl:flex-none mb-10">
            <div class="flex flex-wrap -mx-3">

            <div className="w-full px-6 py-6 mx-auto">
                {/* Data count cards */}
                <div className="flex flex-wrap -mx-1">

                  {/* <!-- card1 --> */}
                  <div className="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/3">
                      <div className="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                      <div className="flex-auto p-4">
                          <div className="flex flex-row -mx-3">
                          <div className="flex-none w-2/3 max-w-full px-3">
                              <div>
                              <p className="mb-0 font-sans font-semibold leading-normal text-base">Total Users</p>
                              <h5 className="mb-0 font-bold">
                              {users.length}
                              </h5>
                              </div>
                          </div>
                          <div className="px-3 text-right basis-1/3">
                              <div className="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-red-900 to-red-500">
                                <PresentationChartBarIcon className='leading-none w-6 h-6 relative top-3.5 text-white'/>
                              </div>
                          </div>
                          </div>
                      </div>
                      </div>
                  </div>
                </div>
            <div className="py-6">
                  {/* <Table users={data} /> */}
  <div className="mt-10 p-4 sm:p-6 lg:p-8 bg-white shadow-soft-xl rounded-2xl">

      <div className="sm:flex sm:items-center">
        <div className="sm:flex-auto">
          <h1 className="text-lg font-semibold leading-6 text-gray-900">Users</h1>
          <p className="mt-2 text-base text-gray-700">
            A list of all the users in your account including their name, title, email and role.
          </p>
        </div>
        <div className="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
          <a href={route('user.create')}>
            <button
              type="button"
              className="block rounded-md bg-gradient-to-tl from-red-900 to-red-500 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-red-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
            >
              Add user
            </button>
          </a>
          
        </div>
      </div>
      <div className="mt-8 flow-root">
        <div className="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div className="inline-block min-w-full py-2 align-middle">
            <table className="min-w-full divide-y divide-solid divide-gray-500">
              <thead>
                <tr>
                  <th
                    scope="col"
                    className="py-3.5 pl-4 pr-3 text-left text-base font-semibold text-gray-900 sm:pl-6 lg:pl-8"
                  >
                    Name
                  </th>
                  <th scope="col" className="px-3 py-3.5 text-left text-base font-semibold text-gray-900">
                    Organization
                  </th>
                  <th scope="col" className="px-3 py-3.5 text-left text-base font-semibold text-gray-900">
                    Email
                  </th>
                  {/* <th scope="col" className="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                    Role
                  </th> */}
                  <th scope="col" className="relative py-3.5 pl-3 pr-4 sm:pr-6 lg:pr-8">
                    <span className="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody className="divide-y divide-solid divide-gray-500">
                {users.map(({id, name, email, organization_name}) => (
                  <tr key={id}>
                    <td className="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">
                      {name}
                    </td>
                    <td className="whitespace-nowrap px-3 py-4 text-base text-gray-700">{organization_name}</td>
                    <td className="whitespace-nowrap px-3 py-4 text-base text-gray-700">{email}</td>
                    {/* <td className="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{data.role}</td> */}
                    <td className="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-base font-medium sm:pr-6 lg:pr-8">
                      <a href={route('user.update', {id})} className="text-indigo-600 hover:text-indigo-900 mr-2">
                        Edit<span className="sr-only">, {name}</span>
                      </a>
                    
                      <a href={route('user.delete', {id})} className="text-red-700 hover:text-red-900 ml-2">
                        Delete<span className="sr-only">, {name}</span>
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
                
              </div>
              

          </div>
        </div>
      </div>
      
  


    </Authenticated>
  );
}