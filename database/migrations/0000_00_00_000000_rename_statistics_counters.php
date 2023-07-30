<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RenameStatisticsCounters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE websockets_statistics_entries CHANGE peak_connection_count temp_peak_connection_count VARCHAR(255) NULL');
        DB::statement('ALTER TABLE websockets_statistics_entries CHANGE websocket_message_count temp_websocket_message_count VARCHAR(255) NULL');
        DB::statement('ALTER TABLE websockets_statistics_entries CHANGE api_message_count temp_api_message_count VARCHAR(255) NULL');

        DB::statement('ALTER TABLE websockets_statistics_entries CHANGE temp_peak_connection_count peak_connections_count VARCHAR(255) NULL');
        DB::statement('ALTER TABLE websockets_statistics_entries CHANGE temp_websocket_message_count websocket_messages_count VARCHAR(255) NULL');
        DB::statement('ALTER TABLE websockets_statistics_entries CHANGE temp_api_message_count api_messages_count VARCHAR(255) NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE websockets_statistics_entries CHANGE peak_connections_count temp_peak_connection_count VARCHAR(255) NULL');
        DB::statement('ALTER TABLE websockets_statistics_entries CHANGE websocket_messages_count temp_websocket_message_count VARCHAR(255) NULL');
        DB::statement('ALTER TABLE websockets_statistics_entries CHANGE api_messages_count temp_api_message_count VARCHAR(255) NULL');

        DB::statement('ALTER TABLE websockets_statistics_entries CHANGE temp_peak_connection_count peak_connection_count VARCHAR(255) NULL');
        DB::statement('ALTER TABLE websockets_statistics_entries CHANGE temp_websocket_message_count websocket_message_count VARCHAR(255) NULL');
        DB::statement('ALTER TABLE websockets_statistics_entries CHANGE temp_api_message_count api_message_count VARCHAR(255) NULL');
    }
}
