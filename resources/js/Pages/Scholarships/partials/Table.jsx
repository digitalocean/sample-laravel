import {Link, usePage} from '@inertiajs/react';
import {
  MaterialReactTable,
  createMRTColumnHelper,
  useMaterialReactTable,
} from 'material-react-table';
import {
  Box,
  Button,
  ListItemIcon,
  MenuItem,
  Typography,
  lighten,
  } from '@mui/material';
import FileDownloadIcon from '@mui/icons-material/FileDownload';
import { mkConfig, generateCsv, download } from 'export-to-csv';
import { AccountCircle, Send } from '@mui/icons-material';


export default function ScholarshipTable() {

  const {allScholaships} = usePage().props
  const {data} = allScholaships;
  console.log(data);

  const columnHelper = createMRTColumnHelper();

  const columns = [
    columnHelper.accessor('id', {
      header: 'ID',
      size: 40,
    }),
    columnHelper.accessor('name', {
      header: 'Scholarship Name',
      size: 150,
    }),
    columnHelper.accessor('additional_information', {
      header: 'Extra Infomation',
      size: 400,
    }),
    columnHelper.accessor('award_payments', {
      header: 'Award size',
      size: 50,
    }),
    columnHelper.accessor('deadline', {
      header: 'Deadline',
    }),
    columnHelper.accessor('fund_amount', {
      header: 'Fund amount',
    }),
    columnHelper.accessor('total', {
      header: 'Total Applications',
      size: 50,
    })
  ];


  const csvConfig = mkConfig({
    fieldSeparator: ',',
    decimalSeparator: '.',
    useKeysAsHeaders: true,
  });

  const handleExportRows = (rows) => {
    const rowData = rows.map((row) => row.original);
    const csv = generateCsv(csvConfig)(rowData);
    download(csvConfig)(csv);
  };

  const handleExportData = () => {
    const csv = generateCsv(csvConfig)(data);
    download(csvConfig)(csv);
  };

  const table = useMaterialReactTable({
    columns,
    data,
    enableRowSelection: true,
    enableRowActions: true,
    columnFilterDisplayMode: 'popover',
    paginationDisplayMode: 'pages',
    positionToolbarAlertBanner: 'bottom',
    renderTopToolbarCustomActions: ({ table }) => (
      <Box
        sx={{
          display: 'flex',
          gap: '16px',
          padding: '8px',
          flexWrap: 'wrap',
        }}
      >
        <Button
          //export all data that is currently in the table (ignore pagination, sorting, filtering, etc.)
          onClick={handleExportData}
          startIcon={<FileDownloadIcon />}
        >
          Export All Data
        </Button>
        <Button
          disabled={table.getPrePaginationRowModel().rows.length === 0}
          //export all rows, including from the next page, (still respects filtering and sorting)
          onClick={() =>
            handleExportRows(table.getPrePaginationRowModel().rows)
          }
          startIcon={<FileDownloadIcon />}
        >
          Export All Rows
        </Button>
        <Button
          disabled={table.getRowModel().rows.length === 0}
          //export all rows as seen on the screen (respects pagination, sorting, filtering, etc.)
          onClick={() => handleExportRows(table.getRowModel().rows)}
          startIcon={<FileDownloadIcon />}
        >
          Export Page Rows
        </Button>
        <Button
          disabled={
            !table.getIsSomeRowsSelected() && !table.getIsAllRowsSelected()
          }
          //only export selected rows
          onClick={() => handleExportRows(table.getSelectedRowModel().rows)}
          startIcon={<FileDownloadIcon />}
        >
          Export Selected Rows
        </Button>
      </Box>
    ),
    renderRowActionMenuItems: ({ closeMenu, row }) => [
        <MenuItem
            key={0}
            onClick={() => {
              closeMenu();
            }}
            sx={{ m: 0 }}
        >
          <ListItemIcon>
            <AccountCircle />
          </ListItemIcon>
            <Link href={route('scholarship.show', row.original.id)}>
                View Scholarship
            </Link>
        </MenuItem>,
        <MenuItem
              key={1}
              onClick={() => {
               // Send email logic...
                closeMenu();
              }}
              sx={{ m: 0 }}
            >
            <ListItemIcon>
              <AccountCircle />
            </ListItemIcon>
            <Link href={route('scholarship.applications.view', row.original.id)}>
                  View applications
            </Link>
       </MenuItem>,
      ],
  });

  return <MaterialReactTable table={table} />;
}

