import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Head, useForm, Link } from "@inertiajs/react";
import { Menu } from '@headlessui/react'
import { EllipsisVerticalIcon } from '@heroicons/react/20/solid'

export default function notesShow({auth, userNotes, student, id}) {

    const { data, setData, post, processing, errors, reset } = useForm({
        title: '',
        body: '',
        noteType: '',
    });

    const submit = (e) => {
        e.preventDefault();
        post(route('notes.student.create'));
    };

  return (
    <Authenticated
      user={auth.user}
      header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Notes View</h2>}
      breadcrumb={<span><Link href={route('application.list')}>Applicants list</Link></span>} >
      
      <Head title="Application View" />
      <div className="mx-auto grid grid-cols-1 gap-x-4 gap-y-8 px-4 py-8 sm:px-6 sm:py-10 lg:max-w-7xl lg:grid-cols-2 lg:px-2">
            <div className="w-full px-2 py-3 mx-auto">
                <div className="overflow-hidden bg-white shadow sm:rounded-lg">
                <div className="px-4 py-8 sm:px-6">
                    <div className="flex justify-between">
                    <h3 className="text-base font-semibold leading-7 text-gray-900">{student} - Latest Notes</h3>
                    <Link
                        href={route('application.view', {id})}
                        className="rounded-md bg-indigo-600 px-2 py-1 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    >
                        View Profile
                    </Link>
                    </div>
                     <p className="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Notes label administration are not seen by student</p>
                
                    <ul role="list" className="divide-y divide-gray-600">
                    {userNotes.map(({
                                id,
                                scholar_id,
                                title,
                                body,
                                noteType,
                                updated_at,
                                user_id,
                                name,
                            }) => (
                        <>
                        <li key={id} className="flex justify-between gap-x-6 py-5">
                            <div className="flex min-w-0 gap-x-4">
                                <div className="min-w-0 flex-auto">
                                <p className="text-base font-semibold leading-6 text-gray-900">
                                    <a href={scholar_id} className="hover:underline">
                                    {title} <br/><span className="text-sm leading-6 text-gray-700">{body}</span>
                                    </a>
                                </p>
                                </div>
                            </div>
                            <div className="flex shrink-0 items-center gap-x-6">
                                <div className="hidden sm:flex sm:flex-col sm:items-end">
                               
                                    <span className="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-sm font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                        {noteType}
                                    </span>
                                
                                    {updated_at ? (
                                        <p className="text-xs leading-5 text-gray-600">
                                        Last updated <time dateTime={updated_at}>{updated_at}</time>
                                        </p>
                                    ) : (
                                        <div className="mt-1 flex items-center gap-x-1.5">
                                        <div className="flex-none rounded-full bg-emerald-500/20 p-1">
                                            <div className="h-1.5 w-1.5 rounded-full bg-emerald-500" />
                                        </div>
                                        <p className="text-xs leading-5 text-gray-500">Online</p>
                                        </div>
                                    )}
                                </div>

                                <Menu as="div" className="relative flex-none">
                                    <Menu.Button className="-m-2.5 block p-2.5 text-gray-500 hover:text-gray-900">
                                        <span className="sr-only">Open options</span>
                                        <EllipsisVerticalIcon aria-hidden="true" className="h-5 w-5" />
                                    </Menu.Button>
                                <Menu.Items
                                    transition
                                    className="absolute right-0 z-10 mt-2 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 transition focus:outline-none data-[closed]:scale-95 data-[closed]:transform data-[closed]:opacity-0 data-[enter]:duration-100 data-[leave]:duration-75 data-[enter]:ease-out data-[leave]:ease-in"
                                >
                                    <Menu.Item>
                                    <a href="#" className="block px-3 py-1 text-sm leading-6 text-gray-900 data-[focus]:bg-gray-50">
                                        View profile<span className="sr-only">, {title}</span>
                                    </a>
                                    </Menu.Item>
                                </Menu.Items>
                                </Menu>
                            </div>
                        </li>
                        </>
                        ))}
                    </ul>
                </div>   
                </div>
            </div>

            <div className="w-full px-2 py-3 mx-auto">
                <div className="overflow-hidden bg-white shadow sm:rounded-lg">
                    <div className="px-4 py-4">
                        <h2 className="text-base font-semibold leading-7 text-gray-900">Create Note </h2>
                        <p className="mt-1 text-sm leading-6 text-gray-600">Use this form to create notes for student or administration notes for team</p>
                    </div>
                    <form onSubmit={submit}>
                    <div className="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2 px-4">
                        <div className="col-span-6">
                        
                            <label htmlFor="noteType" className="block text-sm font-medium leading-6 text-gray-900">
                                label
                            </label>
                            <select
                                id="noteType"
                                name="noteType"
                                value={data.noteType}
                                onChange={(e) => setData('noteType', e.target.value)}
                                className="mt-2 block w-full h-10 rounded-md border-0 py-4 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                defaultValue="pending"
                            >
                                <option>Please select a tag</option>
                                <option value='Administration'>Administration</option>
                                <option value='Student'>Student Note</option>
                                {/* <option value='General'>General Note</option> */}
                            </select>
                        </div>
                        <div className="sm:col-span-full">
                            <label htmlFor="title" className="block text-sm font-medium leading-6 text-gray-900">
                            Title
                            </label>
                            <div className="mt-2">
                                <input
                                type="text"
                                name="title"
                                id="title"
                                value={data.title}
                                autoComplete="title"
                                onChange={(e) => setData('title', e.target.value)}
                                className="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                />
                            </div>
                        </div>

                        <div className="col-span-full">
                            <label htmlFor="body" className="block text-sm font-medium leading-6 text-gray-900">
                                Body
                            </label>
                            <div className="mt-2">
                                <textarea
                                id="body"
                                name="body"
                                value={data.body}
                                onChange={(e) => setData('body', e.target.value)}
                                rows={10}
                                className="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                defaultValue={''}
                                />
                            </div>
                                <p className="mt-1 text-sm leading-6 text-gray-600">Notes are limited to 250 characters</p>
                        </div>
                        
                        <div className="my-2 flex items-center justify-center">
                            <button
                            href={submit}
                            type="submit"
                            className="col-span-full rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                            >
                             Submit
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
      </div>

    </Authenticated>
  );
}
