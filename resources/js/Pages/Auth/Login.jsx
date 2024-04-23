import { useEffect } from 'react';
import Checkbox from '@/Components/Checkbox';
import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Head, Link, useForm } from '@inertiajs/react';

export default function Login({ status, canResetPassword }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: '',
        password: '',
        remember: false,
    });

    useEffect(() => {
        return () => {
            reset('password');
        };
    }, []);

    const submit = (e) => {
        e.preventDefault();

        post(route('login'));
    };

    return (
        <GuestLayout>
            <Head title="Log in" />

            {status && <div className="mb-4 font-medium text-sm text-green-600">{status}</div>}
            <main className="mt-0 transition-all duration-200 ease-soft-in-out">
                <section className="mb-6">
                    <div className="relative flex items-start pt-28 pb-64 m-4 overflow-hidden bg-center bg-cover min-h-100 rounded-xl bg-black">
                        <span className="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-br from-red-800 to-red-600 opacity-80"></span>
                        <div className="container z-10">
                            <div className="flex flex-wrap justify-center -mx-3">
                            <div className="w-full max-w-full px-3 mx-auto mt-0 mb-4 text-center lg:flex-0 shrink-0 lg:w-5/12">
                                <h1 className="mt-16 mb-2 text-white">Welcome!</h1>
                                <p className="text-white">to the Black Scholars Sholarship Portal for team members and Partners. If you would like to setup a Scholarship fund with the Black Scholars please email us OurBlackScholars@ulr.org </p>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div className="container">
                        <div className="flex flex-wrap -mx-3 -mt-40 md:-mt-42 lg:-mt-48">
                            <div className="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
                                <div className="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                                    <div className="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
                                        <h5 className='text-xl py-10'>Login</h5>
                                    </div>
                                    <div className="flex flex-wrap px-3 -mx-3 sm:px-6 xl:px-12">
                                        {/* <div className="w-3/12 max-w-full px-1 ml-auto flex-0">
                                            <a className="inline-block w-full px-6 py-3 mb-4 font-bold text-center text-gray-200 uppercase align-middle transition-all bg-transparent border border-gray-200 border-solid rounded-lg shadow-none cursor-pointer hover:scale-102 leading-pro text-xs ease-soft-in tracking-tight-soft bg-150 bg-x-25 hover:bg-transparent hover:opacity-75">
                                            <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink32">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(3.000000, 3.000000)" fill-rule="nonzero">
                                                    <circle fill="#3C5A9A" cx="29.5091719" cy="29.4927506" r="29.4882047"></circle>
                                                    <path d="M39.0974944,9.05587273 L32.5651312,9.05587273 C28.6886088,9.05587273 24.3768224,10.6862851 24.3768224,16.3054653 C24.395747,18.2634019 24.3768224,20.1385313 24.3768224,22.2488655 L19.8922122,22.2488655 L19.8922122,29.3852113 L24.5156022,29.3852113 L24.5156022,49.9295284 L33.0113092,49.9295284 L33.0113092,29.2496356 L38.6187742,29.2496356 L39.1261316,22.2288395 L32.8649196,22.2288395 C32.8649196,22.2288395 32.8789377,19.1056932 32.8649196,18.1987181 C32.8649196,15.9781412 35.1755132,16.1053059 35.3144932,16.1053059 C36.4140178,16.1053059 38.5518876,16.1085101 39.1006986,16.1053059 L39.1006986,9.05587273 L39.0974944,9.05587273 L39.0974944,9.05587273 Z" fill="#FFFFFF"></path>
                                                </g>
                                                </g>
                                            </svg>
                                            </a>
                                        </div>
                                        <div className="w-3/12 max-w-full px-1 flex-0">
                                            <a className="inline-block w-full px-6 py-3 mb-4 font-bold text-center text-gray-200 uppercase align-middle transition-all bg-transparent border border-gray-200 border-solid rounded-lg shadow-none cursor-pointer hover:scale-102 leading-pro text-xs ease-soft-in tracking-tight-soft bg-150 bg-x-25 hover:bg-transparent hover:opacity-75" href="javascript:;">
                                            <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(7.000000, 0.564551)" fill="#000000" fill-rule="nonzero">
                                                    <path
                                                    d="M40.9233048,32.8428307 C41.0078713,42.0741676 48.9124247,45.146088 49,45.1851909 C48.9331634,45.4017274 47.7369821,49.5628653 44.835501,53.8610269 C42.3271952,57.5771105 39.7241148,61.2793611 35.6233362,61.356042 C31.5939073,61.431307 30.2982233,58.9340578 25.6914424,58.9340578 C21.0860585,58.9340578 19.6464932,61.27947 15.8321878,61.4314159 C11.8738936,61.5833617 8.85958554,57.4131833 6.33064852,53.7107148 C1.16284874,46.1373849 -2.78641926,32.3103122 2.51645059,22.9768066 C5.15080028,18.3417501 9.85858819,15.4066355 14.9684701,15.3313705 C18.8554146,15.2562145 22.5241194,17.9820905 24.9003639,17.9820905 C27.275104,17.9820905 31.733383,14.7039812 36.4203248,15.1854154 C38.3824403,15.2681959 43.8902255,15.9888223 47.4267616,21.2362369 C47.1417927,21.4153043 40.8549638,25.1251794 40.9233048,32.8428307 M33.3504628,10.1750144 C35.4519466,7.59650964 36.8663676,4.00699306 36.4804992,0.435448578 C33.4513624,0.558856931 29.7884601,2.48154382 27.6157341,5.05863265 C25.6685547,7.34076135 23.9632549,10.9934525 24.4233742,14.4943068 C27.7996959,14.7590956 31.2488715,12.7551531 33.3504628,10.1750144"
                                                    ></path>
                                                </g>
                                                </g>
                                            </svg>
                                            </a>
                                        </div>
                                        <div className="w-3/12 max-w-full px-1 mr-auto flex-0">
                                            <a className="inline-block w-full px-6 py-3 mb-4 font-bold text-center text-gray-200 uppercase align-middle transition-all bg-transparent border border-gray-200 border-solid rounded-lg shadow-none cursor-pointer hover:scale-102 leading-pro text-xs ease-soft-in tracking-tight-soft bg-150 bg-x-25 hover:bg-transparent hover:opacity-75" href="javascript:;">
                                            <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(3.000000, 2.000000)" fill-rule="nonzero">
                                                    <path d="M57.8123233,30.1515267 C57.8123233,27.7263183 57.6155321,25.9565533 57.1896408,24.1212666 L29.4960833,24.1212666 L29.4960833,35.0674653 L45.7515771,35.0674653 C45.4239683,37.7877475 43.6542033,41.8844383 39.7213169,44.6372555 L39.6661883,45.0037254 L48.4223791,51.7870338 L49.0290201,51.8475849 C54.6004021,46.7020943 57.8123233,39.1313952 57.8123233,30.1515267" fill="#4285F4"></path>
                                                    <path d="M29.4960833,58.9921667 C37.4599129,58.9921667 44.1456164,56.3701671 49.0290201,51.8475849 L39.7213169,44.6372555 C37.2305867,46.3742596 33.887622,47.5868638 29.4960833,47.5868638 C21.6960582,47.5868638 15.0758763,42.4415991 12.7159637,35.3297782 L12.3700541,35.3591501 L3.26524241,42.4054492 L3.14617358,42.736447 C7.9965904,52.3717589 17.959737,58.9921667 29.4960833,58.9921667" fill="#34A853"></path>
                                                    <path d="M12.7159637,35.3297782 C12.0932812,33.4944915 11.7329116,31.5279353 11.7329116,29.4960833 C11.7329116,27.4640054 12.0932812,25.4976752 12.6832029,23.6623884 L12.6667095,23.2715173 L3.44779955,16.1120237 L3.14617358,16.2554937 C1.14708246,20.2539019 0,24.7439491 0,29.4960833 C0,34.2482175 1.14708246,38.7380388 3.14617358,42.736447 L12.7159637,35.3297782" fill="#FBBC05"></path>
                                                    <path d="M29.4960833,11.4050769 C35.0347044,11.4050769 38.7707997,13.7975244 40.9011602,15.7968415 L49.2255853,7.66898166 C44.1130815,2.91684746 37.4599129,0 29.4960833,0 C17.959737,0 7.9965904,6.62018183 3.14617358,16.2554937 L12.6832029,23.6623884 C15.0758763,16.5505675 21.6960582,11.4050769 29.4960833,11.4050769" fill="#EB4335"></path>
                                                </g>
                                                </g>
                                            </svg>
                                            </a>
                                        </div>
                                        <div className="relative w-full max-w-full px-3 mt-2 text-center shrink-0">
                                            <p className="z-20 inline px-4 mb-2 font-semibold leading-normal bg-white text-sm text-slate-400">or</p>
                                        </div> */}
                                    </div>
                                    <div className="flex-auto p-6">
                                        {/* Form Section */}
                                        <form onSubmit={submit}>
                                            <div>
                                                <InputLabel htmlFor="email" value="Email" />

                                                <TextInput
                                                    id="email"
                                                    type="email"
                                                    name="email"
                                                    value={data.email}
                                                    className="mt-1 block w-full"
                                                    autoComplete="username"
                                                    isFocused={true}
                                                    onChange={(e) => setData('email', e.target.value)}
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
                                                    autoComplete="current-password"
                                                    onChange={(e) => setData('password', e.target.value)}
                                                />

                                                <InputError message={errors.password} className="mt-2" />
                                            </div>

                                            <div className="block mt-4">
                                                <label className="flex items-center">
                                                    <Checkbox
                                                        name="remember"
                                                        checked={data.remember}
                                                        onChange={(e) => setData('remember', e.target.checked)}
                                                    />
                                                    <span className="ml-2 text-sm text-gray-600">Remember me</span>
                                                </label>
                                            </div>

                                            <div className="flex items-center justify-end mt-4">
                                                {canResetPassword && (
                                                    <Link
                                                        href={route('password.request')}
                                                        className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                    >
                                                        Forgot your password?
                                                    </Link>
                                                )}

                                                <PrimaryButton className="ml-4" disabled={processing}>
                                                    Log in
                                                </PrimaryButton>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <footer className="py-2">
                    <div className="container">
                    <div className="flex flex-wrap -mx-3">
                        {/* <div className="flex-shrink-0 w-full max-w-full mx-auto mb-2 text-center lg:flex-0 lg:w-8/12">
                        <a href="javascript:;" target="_blank" className="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Company </a>
                        <a href="javascript:;" target="_blank" className="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> About Us </a>
                        <a href="javascript:;" target="_blank" className="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Team </a>
                        <a href="javascript:;" target="_blank" className="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> ScholarShips </a>
                        </div>
                        <div className="flex-shrink-0 w-full max-w-full mx-auto mt-2 mb-6 text-center lg:flex-0 lg:w-8/12">
                        <a href="javascript:;" target="_blank" className="mr-6 text-slate-400">
                            <span className="text-lg fab fa-dribbble"></span>
                        </a>
                        <a href="javascript:;" target="_blank" className="mr-6 text-slate-400">
                            <span className="text-lg fab fa-twitter"></span>
                        </a>
                        <a href="javascript:;" target="_blank" className="mr-6 text-slate-400">
                            <span className="text-lg fab fa-instagram"></span>
                        </a>
                        <a href="javascript:;" target="_blank" className="mr-6 text-slate-400">
                            <span className="text-lg fab fa-pinterest"></span>
                        </a>
                        <a href="javascript:;" target="_blank" className="mr-6 text-slate-400">
                            <span className="text-lg fab fa-github"></span>
                        </a>
                        </div> */}
                    </div>
                    <div className="flex flex-wrap -mx-3">
                        <div className="w-8/12 max-w-full px-3 mx-auto mt-1 text-center flex-0">
                        <p className="mb-0 text-slate-400">
                            Copyright ©
                            <script>
                            document.write(new Date().getFullYear());
                            </script>
                            Urban League - Black Scholars.
                        </p>
                        </div>
                    </div>
                    </div>
                </footer>
            </main>

        </GuestLayout>
    );
}
