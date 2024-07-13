import React from "react";
import { router } from '@inertiajs/react'
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Head, usePage, Link } from "@inertiajs/react";
import { PresentationChartBarIcon} from "@heroicons/react/24/outline";
import { PhotoIcon, UserCircleIcon } from '@heroicons/react/24/solid'
import { useState } from "react";


export default function create({auth}) {
  const {users, partners, roles} = usePage().props;
  
  const [data, setData] = useState({
    name: '',
    email: '',
    password: '',
    partner_id: '',
    role: '',
  })

  function handleChange(e) {
    const key = e.target.id;
    const value = e.target.value
    setData(data => ({
        ...data,
        [key]: value,
    }))
  }

  function handleSubmit(e) {
    e.preventDefault()
    router.post(route('user.store'), [data] );
  }

  return (
    <Authenticated
      user={auth.user}
      header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">create</h2>}
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
                {/* form section */}
                <div className="py-20">
                  <div className="mx-auto max-w-2xl bg-white shadow-soft-xl rounded-2xl bg-clip-border">

                  <div className="p-6">
          <h2 className="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
          <p className="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>
          <form onSubmit={handleSubmit} className="w-full">
          <div className="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          
            <div className="sm:col-span-3">
              <label htmlFor="name" className="block text-sm font-medium leading-6 text-gray-900">
                Full name
              </label>
              <div className="mt-2">
                <input
                  type="text"
                  name="name"
                  id="name"
                  value={data.name}
                  onChange={handleChange}
                  autoComplete="given-name"
                  className="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
              </div>
            </div>

            <div className="sm:col-span-3">
              <label htmlFor="email" className="block text-sm font-medium leading-6 text-gray-900">
                Email address
              </label>
              <div className="mt-2">
                <input
                  id="email"
                  name="email"
                  type="email"
                  value={data.email}
                  onChange={handleChange}
                  autoComplete="email"
                  className="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
              </div>
            </div>

            <div className="sm:col-span-3">
              <label htmlFor="password" className="block text-sm font-medium leading-6 text-gray-900">
                Password
              </label>
              <div className="mt-2">
                <input
                  id="password"
                  name="password"
                  type="password"
                  autoComplete="password"
                  value={data.password}
                  onChange={handleChange}
                  className="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
              </div>
            </div>

            <div className="sm:col-span-3">
              <label htmlFor="partner_id" className="block text-sm font-medium leading-6 text-gray-900">
                Partner Organization
              </label>
              <div className="mt-2">
                <select
                  id="partner_id"
                  name="partner_id"
                  autoComplete="partner_id"
                  onChange={handleChange}
                  className="block w-full h-10 rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                >
                  <option>Select Partner</option>
                  {partners.map(({id, contact_name, email, organization_name}) => (
                  <option value={id}>{organization_name}</option>
                  ))}
                </select>
              </div>
            </div>

            <div className="sm:col-span-3">
              <label htmlFor="role" className="block text-sm font-medium leading-6 text-gray-900">
                Role
              </label>
              <div className="mt-2">
                <select
                  id="role"
                  name="role"
                  autoComplete="role"
                  onChange={handleChange}
                  className="mt-2 block w-full h-10 rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"
                >
                  <option>Select Role</option>
                  {roles.map(({id, name}) => (
                  <option value={name}>{name}</option>
                  ))}
                </select>
              </div>
            </div>

            <div className="sm:col-span-6 pt-4">
              <button
                type="submit"
                className="flex w-full justify-center rounded-md bg-gradient-to-tl from-red-900 to-red-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
              >
                Submit
              </button>
            </div>
          </div>
          </form>
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