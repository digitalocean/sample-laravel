import React, { useEffect } from "react";
import { usePage } from '@inertiajs/react';
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend,
  } from 'chart.js';
  import { Line } from 'react-chartjs-2';

export default function Yearlychart() {
    const {scholarships} = usePage().props;

    const currentTotal = scholarships.reduce((a, c) => a + c.fund_amount, 0);

    ChartJS.register(
        CategoryScale,
        LinearScale,
        PointElement,
        LineElement,
        Title,
        Tooltip,
        Legend
    );

    const options = {
        responsive: true,
        plugins: {
          title: {
            display: false,
            text: 'Chart.js Line Chart',
          },
        },
      };

    const labels = ["2021", "2022", "2023", "2024", "2025", "2026", "2027"];
        const data = {
            labels: labels,
            datasets: [
            {
                label: "",
                // backgroundColor: "hsl(252, 82.9%, 67.8%)",
                borderColor: "hsl(252, 82.9%, 67.8%)",
                data: [0, 0, 0, currentTotal, 0, 0, 0],
            },
            ],
        };


    return (
        <>
            <div className="flex items-center justify-center py-8 px-4">
                <div className="w-full">
                    <div className="flex flex-col justify-between h-full">
                    <h3 className="text-red-800 leading-5 text-lg md:text-2xl">${currentTotal}</h3>
                        <div>
                            <div className="flex items-end mt-2">
                                {/* <div className="flex items-center md:ml-4 ml-1">
                                    <p className="text-indigo-500 text-xs md:text-base">17%</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width={12} height={12} viewBox="0 0 12 12" fill="none">
                                        <path d="M6 2.5V9.5" stroke="#4338CA" strokeWidth="0.75" strokeLinecap="round" strokeLinejoin="round" />
                                        <path d="M8 4.5L6 2.5" stroke="#4338CA" strokeWidth="0.75" strokeLinecap="round" strokeLinejoin="round" />
                                        <path d="M4 4.5L6 2.5" stroke="#4338CA" strokeWidth="0.75" strokeLinecap="round" strokeLinejoin="round" />
                                    </svg>
                                </div> */}
                            </div>
                        </div>
                        <div className="mt-2">
                            {/* <canvas class="p-10" id="chartLine" width={1025} height={400}></canvas> */}
                            <Line options={options} data={data} />
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
