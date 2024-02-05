import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, usePage } from '@inertiajs/react';
import { BriefcaseIcon, BanknotesIcon, ClipboardDocumentListIcon, AcademicCapIcon, ArrowSmallRightIcon } from '@heroicons/react/24/solid';
import CreatePartner from './Dashboard/./partials/create_Partner';
import Yearlychart from './Dashboard/./partials/yearly-chart';

export default function Dashboard({ auth }) {
    const {scholarships} = usePage().props;
    const {applications} = usePage().props;
    const {partners} = usePage().props;

    const totalScholarshipamount = scholarships.reduce((a, c) => a + c.fund_amount, 0);

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
            breadcrumb={<span> Dashboard</span>}
        >
            <Head title="Dashboard" />

            <div className="w-full px-6 py-6 mx-auto">
                <div className="flex flex-wrap -mx-3">
                    {/* <!-- card1 --> */}
                    <div className="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                        <div className="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                        <div className="flex-auto p-4">
                            <div className="flex flex-row -mx-3">
                            <div className="flex-none w-2/3 max-w-full px-3">
                                <div>
                                <p className="mb-0 font-sans font-semibold leading-normal text-sm">Total Scholarships</p>
                                <h5 className="mb-0 font-bold">
                                    {scholarships.length}
                                    {/* <span className="leading-normal text-sm font-weight-bolder text-lime-500">+55%</span> */}
                                </h5>
                                </div>
                            </div>
                            <div className="px-3 text-right basis-1/3">
                                <div className="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-r from-rose-900 to-red-500">
                                <AcademicCapIcon className='leading-none w-6 h-6 relative top-3.5 text-white'/>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    {/* <!-- card2 --> */}
                    <div className="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                        <div className="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                        <div className="flex-auto p-4">
                            <div className="flex flex-row -mx-3">
                            <div className="flex-none w-2/3 max-w-full px-3">
                                <div>
                                <p className="mb-0 font-sans font-semibold leading-normal text-sm">Total Applications</p>
                                <h5 className="mb-0 font-bold">
                                {applications.length}
                                    {/* <span className="leading-normal text-sm font-weight-bolder text-lime-500">+3%</span> */}
                                </h5>
                                </div>
                            </div>
                            <div className="px-3 text-right basis-1/3">
                                <div className="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-red-900 to-red-500">
                                    <ClipboardDocumentListIcon className='leading-none w-6 h-6 relative top-3.5 text-white' />
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    {/* <!-- card3 --> */}
                    <div className="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                        <div className="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                        <div className="flex-auto p-4">
                            <div className="flex flex-row -mx-3">
                            <div className="flex-none w-2/3 max-w-full px-3">
                                <div>
                                <p className="mb-0 font-sans font-semibold leading-normal text-sm">Partners</p>
                                <h5 className="mb-0 font-bold">
                                    {partners.length}
                                    {/* <span className="leading-normal text-red-600 text-sm font-weight-bolder">-2%</span> */}
                                </h5>
                                </div>
                            </div>
                            <div className="px-3 text-right basis-1/3">
                                <div className="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-red-900 to-red-500">
                                    <BriefcaseIcon className='leading-none w-6 h-6 relative top-3.5 text-white'/>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    {/* <!-- card4 --> */}
                    <div className="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
                        <div className="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                        <div className="flex-auto p-4">
                            <div className="flex flex-row -mx-3">
                            <div className="flex-none w-2/3 max-w-full px-3">
                                <div>
                                <p className="mb-0 font-sans font-semibold leading-normal text-sm">Total funds</p>
                                <h5 className="mb-0 font-bold">
                                    ${totalScholarshipamount}
                                    {/* <span className="leading-normal text-sm font-weight-bolder text-lime-500">+5%</span> */}
                                </h5>
                                </div>
                            </div>
                            <div className="px-3 text-right basis-1/3">
                                <div className="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-red-900 to-red-500">
                                    <BanknotesIcon className='leading-none w-6 h-6 relative top-3.5 text-white'/>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                {/* row 2 */}
                <div className="flex flex-wrap mt-6 -mx-3">
                    <div className="w-full px-3 mb-6 lg:mb-0 lg:w-7/12 lg:flex-none">
                        <div className="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                        <div className="flex-auto p-4">
                            <div className="flex flex-wrap -mx-3">
                            <div className="max-w-full px-3 lg:w-1/2 lg:flex-none">
                                <div className="flex flex-col h-full">
                                <p className="pt-2 mb-1 font-semibold">Partners</p>
                                <h5 className="font-bold">Partners Create</h5>
                                <p className="mb-12">Our partners are vital to our young black scholars. Its is our duty to provide the partners and students a experience of success.</p>
                                    <CreatePartner />
                                </div>
                            </div>
                            <div className="max-w-full px-3 mt-12 ml-auto text-center lg:mt-0 lg:w-5/12 lg:flex-none">
                                <div className="h-full bg-gradient-to-tl from-red-900 to-red-500 rounded-xl">
                                <img src="assets/img/shapes/waves-white.svg" className="absolute top-0 hidden w-1/2 h-full lg:block" alt="waves" />
                                <div className="relative flex items-center justify-center h-full">
                                    
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div className="w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
                        <div className="border-black/12.5 shadow-soft-xl relative flex h-full min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border p-4">
                        <div className="relative h-full overflow-hidden bg-cover rounded-xl">
                            <span className="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-gray-900 to-slate-800 opacity-80"></span>
                            <div className="relative z-10 flex flex-col flex-auto h-full p-4">
                            <h5 className="pt-2 mb-6 font-bold text-white">Work with the Black Scholars</h5>
                            <p className="text-white">We are a great organization for students but we need help from partners. It is all about who takes the first opportunity.</p>
                            <a className="mt-auto mb-0 font-semibold leading-normal text-white group text-base" href="javascript:;">
                                Learn how to work with partners in giving
                                <ArrowSmallRightIcon className='fas fa-arrow-right ease-bounce w-4 h-4 group-hover:translate-x-1.25 ml-1 leading-normal transition-all duration-200'/>
                            </a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                {/* row 3 */}
                <div className="flex flex-wrap mt-6 -mx-3">
                    <div className="w-full px-3 mb-6 lg:mb-0 lg:w-7/12 lg:flex-none">
                        <div className="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                            <div className="flex-auto p-4">
                                <div className="flex flex-wrap -mx-3">
                                    <div className="max-w-full px-3 lg:w-full lg:flex-none">
                                        <div className="flex flex-col h-full">
                                            <p className="pt-2 mb-1 font-semibold">Yearly Funds</p>
                                            <h5 className="font-bold">Black Scholars Year over Year funds</h5>
                                            <Yearlychart />
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
                        <div className="border-black/12.5 shadow-soft-xl relative flex h-full min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border p-4">
                        <div className="relative h-full overflow-hidden bg-cover rounded-xl">
                            <span className="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-gray-900 to-slate-800 opacity-80"></span>
                            <div className="relative z-10 flex flex-col flex-auto h-full p-4">
                            <h5 className="pt-2 mb-6 font-bold text-white">Import bulk Scholarships</h5>
                            <p className="text-white">Here you can bulk import scholarship for partners</p>
                            <div className='mt-auto'>
                            <form action="{{ route('csv.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input
                                    type="file"
                                    name="file"
                                    id="file"
                                    accept=".csv"
                                    className="block w-full rounded-md border-0 py-1.5 mr-4 bg-white text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    placeholder=""
                                    />
                                <button type="submit">Import CSV</button>
                            </form>
                            </div>
                            {/* <a className="mt-auto mb-0 font-semibold leading-normal text-white group text-base" href="javascript:;">
                                Import
                                <ArrowSmallRightIcon className='fas fa-arrow-right ease-bounce w-4 h-4 group-hover:translate-x-1.25 ml-1 leading-normal transition-all duration-200'/>
                            </a> */}
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                {/* <YearlyChart /> */}
            </div>
        </AuthenticatedLayout>
    );
}
