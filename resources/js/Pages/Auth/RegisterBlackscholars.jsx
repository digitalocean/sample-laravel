import { useEffect, Fragment, useState } from 'react';
import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Head, Link, useForm } from '@inertiajs/react';
import { Tab } from '@headlessui/react'

export default function Register() {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        parent_name: '',
        parent_email: '',
        parent_name2: '',
        parent_email2: '',
        graduation_year: '',
        school: '',
    });
    const [selectedIndex, setSelectedIndex] = useState(0)
    useEffect(() => {
        return () => {
            reset('password', 'password_confirmation');
        };
    }, []);

    const submit = (e) => {
        e.preventDefault();

        post(route('register.scholars'));
    };

    return (
        <div className="flex min-h-screen flex-1">
            <div className="flex flex-1 flex-col justify-center px-4 py-12 sm:px-6 lg:flex-none lg:px-24 xl:px-28">
                <div className="mx-auto w-full max-w-sm lg:w-96">
                    <div>
                        <img
                            alt="Your Company"
                            src="/assets/logos/blackscholarslogo.png"
                            className="h-20 w-auto"
                        />
                        <h2 className="mt-4 text-2xl font-bold leading-9 tracking-tight text-gray-900">
                            Sign in to your account
                        </h2>
                        <p className="mt-2 text-base leading-6 text-gray-700">
                            Already a member?{' '}
                            <a href={route("login")} className="font-semibold text-red-800 hover:text-red-900">
                            Login here
                            </a>
                        </p>
                    </div>

                    <div className="mt-6">
                    <div>
                        {/* tab registratrion */}
                    <Tab.Group 
                            onChange={(index) => {
                                console.log('Changed selected tab to:', index)
                            }}
                        >
                            <div className='py-2'>
                                <Tab.List>
                                    <Tab as={Fragment}>
                                        {({ selected }) => (
                                            /* Use the `selected` state to conditionally style the selected tab. */
                                            <button
                                            className={
                                                selected ? 'border-spacing-1 border-2 rounded border-red-800 text-red-800 py-1 w-1/3' : ' text-black py-2 w-1/3'
                                            }
                                            >
                                            Register
                                            </button>
                                        )}
                                        
                                    </Tab>

                                    {/* Selects this tab by default */}
                                    <Tab as={Fragment}>
                                        {({ selected }) => (
                                            /* Use the `selected` state to conditionally style the selected tab. */
                                            <button
                                            className={
                                                selected ? 'border-spacing-1 border-2 rounded border-red-800 text-red-800 py-1 w-1/3': ' text-black py-2 w-1/3'
                                            }
                                            >
                                            Parent Info 
                                            </button>
                                        )}
                                
                                    </Tab>

                                    <Tab as={Fragment}>
                                        {({ selected }) => (
                                            /* Use the `selected` state to conditionally style the selected tab. */
                                            <button
                                            className={
                                                selected ? 'border-spacing-1 border-2 rounded border-red-800 text-red-800 py-1 w-1/3' : ' text-black py-2 w-1/3'
                                            }
                                            >
                                            School Info
                                            </button>
                                        )}
                                    
                                    </Tab>
                                </Tab.List>
                            </div>
                            <Tab.Panels>
                            <form onSubmit={submit} className='py-4'>
                                <Tab.Panel>
                                        <div>
                                            <InputLabel htmlFor="name" value="Name" />

                                            <TextInput
                                                id="name"
                                                name="name"
                                                value={data.name}
                                                className="mt-1 block w-full"
                                                autoComplete="name"
                                                isFocused={true}
                                                onChange={(e) => setData('name', e.target.value)}
                                                required
                                            />

                                            <InputError message={errors.name} className="mt-2" />
                                        </div>

                                        <div className="mt-4">
                                            <InputLabel htmlFor="email" value="Email" />

                                            <TextInput
                                                id="email"
                                                type="email"
                                                name="email"
                                                value={data.email}
                                                className="mt-1 block w-full"
                                                autoComplete="username"
                                                onChange={(e) => setData('email', e.target.value)}
                                                required
                                            />

                                            <InputError message={errors.email} className="mt-2" />
                                        </div>

                                        <div className="mt-4">
                                            <InputLabel htmlFor="password" value="Password" />

                                            <TextInput
                                                id="password"
                                                type="password"
                                                name="password"
                                                value={data.password}
                                                className="mt-1 block w-full"
                                                autoComplete="new-password"
                                                onChange={(e) => setData('password', e.target.value)}
                                                required
                                            />

                                            <InputError message={errors.password} className="mt-2" />
                                        </div>

                                        <div className="mt-4">
                                            <InputLabel htmlFor="password_confirmation" value="Confirm Password" />

                                            <TextInput
                                                id="password_confirmation"
                                                type="password"
                                                name="password_confirmation"
                                                value={data.password_confirmation}
                                                className="mt-1 block w-full"
                                                autoComplete="new-password"
                                                onChange={(e) => setData('password_confirmation', e.target.value)}
                                                required
                                            />

                                            <InputError message={errors.password_confirmation} className="mt-2" />
                                        </div>

                                        <div className="flex items-center justify-end mt-4">
                                            <Link
                                                href={route('login')}
                                                className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                            >
                                                Already registered?
                                            </Link>
                                            
                                            {/* <Tab.List>
                                                <Tab as={Fragment}>
                                                    <PrimaryButton className="ml-4" disabled={processing}>
                                                        Next
                                                    </PrimaryButton>
                                                </Tab>
                                            </Tab.List> */}
                                        </div>
                                    
                                </Tab.Panel>

                                {/* Displays this panel by default */}
                                <Tab.Panel>
                                        <div>
                                            <InputLabel htmlFor="parent_name" value="Parent/Gaurdian name" />

                                            <TextInput
                                                id="parent_name"
                                                name="parent_name"
                                                value={data.parent_name}
                                                className="mt-1 block w-full"
                                                autoComplete="parent_name"
                                                isFocused={true}
                                                onChange={(e) => setData('parent_name', e.target.value)}
                                                required
                                            />

                                            <InputError message={errors.parent_name} className="mt-2" />
                                        </div>

                                        <div className="mt-4">
                                            <InputLabel htmlFor="parent_email" value="Parent/Gaurdian Email" />

                                            <TextInput
                                                id="parent_email"
                                                type="email"
                                                name="parent_email"
                                                value={data.parent_email}
                                                className="mt-1 block w-full"
                                                autoComplete="username"
                                                onChange={(e) => setData('parent_email', e.target.value)}
                                                required
                                            />

                                            <InputError message={errors.parent_email} className="mt-2" />
                                        </div>
                                        <div className="mt-4">
                                            <InputLabel htmlFor="parent_name2" value="Secondary Parent/Gaurdian name" />

                                            <TextInput
                                                id="parent_name2"
                                                name="parent_name2"
                                                value={data.parent_name2}
                                                className="mt-1 block w-full"
                                                autoComplete="parent_name2"
                                                onChange={(e) => setData('parent_name2', e.target.value)}
                                                required
                                            />

                                            <InputError message={errors.parent_name2} className="mt-2" />
                                        </div>

                                        <div className="mt-4">
                                            <InputLabel htmlFor="parent_email2" value="Secondary Parent/Gaurdian  Email" />

                                            <TextInput
                                                id="parent_email2"
                                                type="email"
                                                name="parent_email2"
                                                value={data.parent_email2}
                                                className="mt-1 block w-full"
                                                autoComplete="email2"
                                                onChange={(e) => setData('parent_email2', e.target.value)}
                                                required
                                            />

                                            <InputError message={errors.parent_email2} className="mt-2" />
                                        </div>

                                        <div className="flex items-center justify-end mt-4">
                                            <Link
                                                href={route('login')}
                                                className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                            >
                                                Already registered?
                                            </Link>

                                            {/* <PrimaryButton className="ml-4" disabled={processing} selectedIndex={1} onChange={setSelectedIndex}>
                                                Next
                                            </PrimaryButton> */}
                                        </div>
                                </Tab.Panel>

                                <Tab.Panel>
                                        <div>
                                            <InputLabel htmlFor="school" value="School Name" />

                                            <TextInput
                                                id="school"
                                                name="school"
                                                value={data.school}
                                                className="mt-1 block w-full"
                                                autoComplete="school"
                                                isFocused={true}
                                                onChange={(e) => setData('school', e.target.value)}
                                                required
                                            />

                                            <InputError message={errors.school} className="mt-2" />
                                        </div>

                                        <div className="mt-4">
                                            <InputLabel htmlFor="graduation_year" value="Graduation Year" />

                                            <TextInput
                                                id="graduation_year"
                                                name="graduation_year"
                                                value={data.graduation_year}
                                                className="mt-1 block w-full"
                                                autoComplete="graduation year"
                                                onChange={(e) => setData('graduation_year', e.target.value)}
                                                required
                                            />

                                            <InputError message={errors.graduation_year} className="mt-2" />
                                        </div>
                                        <div className="flex items-center justify-end mt-4">
                                            <Link
                                                href={route('login')}
                                                className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                            >
                                                Already registered?
                                            </Link>

                                            <PrimaryButton className="ml-4" disabled={processing}>
                                                Submit
                                            </PrimaryButton>
                                        </div>
                                </Tab.Panel>
                            </form>
                            </Tab.Panels>
                        </Tab.Group>
                    </div>
                {/* Social logins for later */}
                    {/* <div className="mt-10">
                        <div className="relative">
                        <div aria-hidden="true" className="absolute inset-0 flex items-center">
                            <div className="w-full border-t border-gray-200" />
                        </div>
                        <div className="relative flex justify-center text-sm font-medium leading-6">
                            <span className="bg-white px-6 text-gray-900">Or continue with</span>
                        </div>
                        </div>

                        <div className="mt-6 grid grid-cols-2 gap-4">
                        <a
                            href="#"
                            className="flex w-full items-center justify-center gap-3 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus-visible:ring-transparent"
                        >
                            <svg viewBox="0 0 24 24" aria-hidden="true" className="h-5 w-5">
                            <path
                                d="M12.0003 4.75C13.7703 4.75 15.3553 5.36002 16.6053 6.54998L20.0303 3.125C17.9502 1.19 15.2353 0 12.0003 0C7.31028 0 3.25527 2.69 1.28027 6.60998L5.27028 9.70498C6.21525 6.86002 8.87028 4.75 12.0003 4.75Z"
                                fill="#EA4335"
                            />
                            <path
                                d="M23.49 12.275C23.49 11.49 23.415 10.73 23.3 10H12V14.51H18.47C18.18 15.99 17.34 17.25 16.08 18.1L19.945 21.1C22.2 19.01 23.49 15.92 23.49 12.275Z"
                                fill="#4285F4"
                            />
                            <path
                                d="M5.26498 14.2949C5.02498 13.5699 4.88501 12.7999 4.88501 11.9999C4.88501 11.1999 5.01998 10.4299 5.26498 9.7049L1.275 6.60986C0.46 8.22986 0 10.0599 0 11.9999C0 13.9399 0.46 15.7699 1.28 17.3899L5.26498 14.2949Z"
                                fill="#FBBC05"
                            />
                            <path
                                d="M12.0004 24.0001C15.2404 24.0001 17.9654 22.935 19.9454 21.095L16.0804 18.095C15.0054 18.82 13.6204 19.245 12.0004 19.245C8.8704 19.245 6.21537 17.135 5.2654 14.29L1.27539 17.385C3.25539 21.31 7.3104 24.0001 12.0004 24.0001Z"
                                fill="#34A853"
                            />
                            </svg>
                            <span className="text-sm font-semibold leading-6">Google</span>
                        </a>

                        <a
                            href="#"
                            className="flex w-full items-center justify-center gap-3 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus-visible:ring-transparent"
                        >
                            <svg fill="currentColor" viewBox="0 0 20 20" aria-hidden="true" className="h-5 w-5 fill-[#24292F]">
                            <path
                                d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.31.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z"
                                clipRule="evenodd"
                                fillRule="evenodd"
                            />
                            </svg>
                            <span className="text-sm font-semibold leading-6">GitHub</span>
                        </a>
                    </div>
                    </div> */}

                    </div>
                </div>
            </div>
            <div className="relative hidden w-0 flex-1 lg:block">
            <img
                alt=""
                src="https://images.unsplash.com/photo-1496917756835-20cb06e75b4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1908&q=80"
                className="absolute inset-0 h-full w-full object-cover"
            />
            </div>
      </div>
    );
}
