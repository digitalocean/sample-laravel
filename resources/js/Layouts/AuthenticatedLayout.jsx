import { useState } from 'react';
import { usePage } from '@inertiajs/react'
import Dropdown from '@/Components/Dropdown';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink';
import { BriefcaseIcon } from "@heroicons/react/24/solid";
import { BuildingOfficeIcon, SquaresPlusIcon, AcademicCapIcon, BanknotesIcon } from "@heroicons/react/24/solid";

export default function Authenticated({ user, header, breadcrumb, children }) {
    const { role } = usePage().props;
    console.log(role);
    const [showingNavigationDropdown, setShowingNavigationDropdown] = useState(false);

    return (
        <div className="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">
            <aside className="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 ml-4 block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased shadow-none transition-transform duration-200 xl:left-0 xl:translate-x-0">
                <div className="h-24">
                    <i className="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden"></i>
                    <a className="block px-8 py-2 m-0 text-sm whitespace-nowrap text-slate-700" href="javascript:;" target="_blank">
                     <img src="/assets/logos/blackscholarslogo.png" className="inline h-full w-full max-w-full transition-all duration-200 ease-nav-brand" alt="main_logo" />
                    </a>
                </div>

                <hr className="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />
               
                <div className="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
                    <ul className="flex flex-col pl-0 mb-0">
                    {role === 'admin'
                        ? <li className="mt-0.5 w-full">
                                <a className="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href={route('dashboard')}>
                                <div className="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                    <BriefcaseIcon className='w-16 h-16' />
                                </div>
                                <span className="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Dashboard</span>
                                </a>
                            </li>
                        : <li className="mt-0.5 w-full">
                                <a className="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href={route('partner.show', user.partner_id)}>
                                <div className="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                    <BriefcaseIcon className='w-16 h-16' />
                                </div>
                                <span className="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Partner Dashboard</span>
                                </a>
                            </li>
                    }
                   

                    {role === 'admin'
                        ?<li className="mt-0.5 w-full">
                                <a className="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href={route('scholarship.list')}>
                                <div className="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                    <BanknotesIcon className='w-16 h-16' />
                                </div>
                                <span className="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Scholarships</span>
                                </a>
                            </li>
                        : <p></p>
                    }

                    {role == 'admin'
                        ? <li className="mt-0.5 w-full">
                                <a className="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href={route('application.list')}>
                                <div className="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                    <AcademicCapIcon className='w-16 h-16' />
                                </div>
                                <span className="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Applications</span>
                                </a>
                            </li>
                        : <p></p>
                    }       

                    {role == 'admin'
                        ? <li className="mt-0.5 w-full">
                                <a className="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href={route('partner.list')}>
                                <div className="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                    <BuildingOfficeIcon className='w-16 h-16' />
                                </div>
                                <span className="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Partners</span>
                                </a>
                            </li>
                        : <p></p>
                    }
                    <li className="w-full mt-4">
                        <h6 className="pl-6 ml-2 font-bold leading-tight uppercase text-xs opacity-60">Account pages</h6>
                    </li>
                    {role == 'admin'
                        ? <li className="mt-0.5 w-full">
                                <a className="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href={route('user.index')}>
                                <div className="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                    <SquaresPlusIcon className='w-16 h-16' />
                                </div>
                                <span className="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Users</span>
                                </a>
                            </li>
                        : <p></p>
                    }
                    
                     <li className="mt-0.5 w-full">
                        <a className="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href={route('profile.edit')}>
                        <div className="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>customer-support</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                <g transform="translate(1716.000000, 291.000000)">
                                    <g transform="translate(1.000000, 0.000000)">
                                    <path className="fill-slate-800 opacity-60" d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z"></path>
                                    <path className="fill-slate-800" d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"></path>
                                    <path className="fill-slate-800" d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"></path>
                                    </g>
                                </g>
                                </g>
                            </g>
                            </svg>
                        </div>
                        <span className="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Profile</span>
                        </a>
                    </li>
                    </ul>
                </div>

                <div className="mx-4">
                    
                    {/* <p className="invisible hidden text-gray-800 text-red-500 text-red-600 after:bg-gradient-to-tl after:from-gray-900 after:to-slate-800 after:bg-gradient-to-tl after:from-blue-600 after:to-cyan-400 after:bg-gradient-to-tl after:from-red-500 after:to-yellow-400 after:bg-gradient-to-tl after:from-green-600 after:to-lime-400 after:bg-gradient-to-tl after:from-red-600 after:to-rose-400 after:bg-gradient-to-tl after:from-slate-600 after:to-slate-300 text-lime-500 text-cyan-500 text-slate-400 text-fuchsia-500"></p>
                    <div className="after:opacity-65 after:bg-gradient-to-tl after:from-slate-600 after:to-slate-300 relative flex min-w-0 flex-col items-center break-words rounded-2xl border-0 border-solid border-blue-900 bg-white bg-clip-border shadow-none after:absolute after:top-0 after:bottom-0 after:left-0 after:z-10 after:block after:h-full after:w-full after:rounded-2xl after:content-['']">
                        <div className="mb-7.5 absolute h-full w-full rounded-2xl bg-cover bg-center" style="background-image: url('../assets/img/curved-images/white-curved.jpeg')"></div>
                            <div className="relative z-20 flex-auto w-full p-4 text-left text-white">
                                <div className="flex items-center justify-center w-8 h-8 mb-4 text-center bg-white bg-center rounded-lg icon shadow-soft-2xl">
                                    <i className="top-0 z-10 text-transparent ni leading-none ni-diamond text-lg bg-gradient-to-tl from-slate-600 to-slate-300 bg-clip-text opacity-80"></i>
                                </div>
                                <div className="transition-all duration-200 ease-nav-brand">
                                    <h6 className="mb-0 text-white">Need help?</h6>
                                    <p className="mt-0 mb-4 font-semibold leading-tight text-xs">Please check our docs</p>
                                    <a href="https://www.creative-tim.com/learning-lab/tailwind/html/quick-start/soft-ui-dashboard/" target="_blank" className="inline-block w-full px-8 py-2 mb-0 font-bold text-center text-black uppercase transition-all ease-in bg-white border-0 border-white rounded-lg shadow-soft-md bg-150 leading-pro text-xs hover:shadow-soft-2xl hover:scale-102">Documentation</a>
                                </div>
                            </div>
                    </div> */}
                    <a className="inline-block w-full px-6 py-3 my-4 font-bold text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro text-xs bg-gradient-to-tl from-red-900 to-red-500 hover:shadow-soft-2xl hover:scale-102" target="_blank" href="#">Support</a>
                </div>
                </aside>

            <main className='ease-soft-in-out xl:ml-68.5 relative h-full min-h-screen rounded-xl transition-all duration-200'>
                <nav className="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="true">
                    <div className="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
                        <nav>
                            <ol className="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                            <li className="leading-normal text-sm">
                                <a className="opacity-50 text-slate-700" href="javascript:;">Pages</a>
                            </li>
                            {breadcrumb && (
                                <li className="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">{breadcrumb}</li>
                            )}
                            
                            </ol>
                            {header && (
                                <header className="">
                                    <h6 className="mb-0 font-bold capitalize">{header}</h6>
                                </header>
                            )}
                        </nav>

                        <div className="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
                            <div className="flex items-center md:ml-auto md:pr-4">
                                <div className="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft">
                                    {/* <span className="text-sm ease-soft leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                                    <i className="fas fa-search"></i>
                                    </span>
                                    <input type="text" className="pl-8.75 text-sm focus:shadow-soft-primary-outline ease-soft w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Type here..." /> */}
                                    <Dropdown>
                                        <Dropdown.Trigger>
                                            <span className="inline-flex rounded-md">
                                                <button
                                                    type="button"
                                                    className="inline-flex items-center px-3 py- text-sm leading-4 font-medium rounded-md text-gray-700 hover:text-gray-900 focus:outline-none transition ease-in-out duration-150"
                                                >
                                                    {user.name}

                                                    <svg
                                                        className="ml-2 -mr-0.5 h-4 w-4"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor"
                                                    >
                                                        <path
                                                            fillRule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clipRule="evenodd"
                                                        />
                                                    </svg>
                                                </button>
                                            </span>
                                        </Dropdown.Trigger>

                                        <Dropdown.Content>
                                            <Dropdown.Link href={route('profile.edit')}>Profile</Dropdown.Link>
                                            <Dropdown.Link href={route('logout')} method="post" as="button">
                                                Log Out
                                            </Dropdown.Link>
                                        </Dropdown.Content>
                                    </Dropdown>
                                </div>
                            </div>
                            <ul className="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">

                                {/* <li className="relative flex items-center ml-2 pr-2">
                                    <Dropdown>
                                        <Dropdown.Trigger>
                                            <span className="inline-flex rounded-md">
                                                <button
                                                    type="button"
                                                    className="inline-flex items-center px-3 py-2 border border-transparent text-base font-medium rounded-md text-gray-700 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                                >
                                                    Notifications
                                                    <svg
                                                        className="-mr-0.5 h-4 w-4"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor"
                                                    >
                                                        <path
                                                            fillRule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clipRule="evenodd"
                                                        />
                                                    </svg>
                                                </button>
                                            </span>
                                        </Dropdown.Trigger>

                                        <Dropdown.Content>
                                            
                                            <Dropdown.Link href="#">Profile</Dropdown.Link>
                                            <Dropdown.Link href="#">
                                                <div className="flex py-1">
                                                    <div className="inline-flex items-center justify-center my-auto mr-4 text-white transition-all duration-200 ease-nav-brand text-sm bg-gradient-to-tl from-slate-600 to-slate-300 h-9 w-9 rounded-xl">
                                                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                            <title>credit-card</title>
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                                <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(453.000000, 454.000000)">
                                                                    <path className="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                                    <path className="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                                                </g>
                                                                </g>
                                                            </g>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div className="flex flex-col justify-center">
                                                        <h6 className="mb-1 font-normal leading-normal text-sm">Payment successfully completed</h6>
                                                        <p className="mb-0 leading-tight text-xs text-slate-400">
                                                            <i className="mr-1 fa fa-clock"></i>
                                                            2 days
                                                        </p>
                                                    </div>
                                                </div>
                                            </Dropdown.Link>
                                        
                                        </Dropdown.Content>
                                    </Dropdown>
                                </li> */}

                                {/* <li className="flex items-center">
                                    <a href={route('logout')} className="block px-0 py-2 font-semibold transition-all ease-nav-brand text-sm text-slate-500">
                                    <i className="fa fa-user sm:mr-1"></i>
                                    <span className="hidden sm:inline">Logout</span>
                                    </a>
                                </li> */}
                            </ul>
                            <div className={(showingNavigationDropdown ? 'block' : 'hidden') + ' sm:hidden'}>
                                <div className="pt-2 pb-3 space-y-1">
                                    <ResponsiveNavLink href={route('dashboard')} active={route().current('dashboard')}>
                                        Dashboard
                                    </ResponsiveNavLink>
                                </div>

                                <div className="pt-4 pb-1 border-t border-gray-200">
                                    <div className="px-4">
                                        <div className="font-medium text-base text-gray-800">{user.name}</div>
                                        <div className="font-medium text-sm text-gray-500">{user.email}</div>
                                    </div>

                                    <div className="mt-3 space-y-1">
                                        <ResponsiveNavLink href={route('profile.edit')}>Profile</ResponsiveNavLink>
                                        <ResponsiveNavLink method="post" href={route('logout')} as="button">
                                            Log Out
                                        </ResponsiveNavLink>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                    
                {/* page content */}
                    {children}
            </main>
        </div>
    );
}
