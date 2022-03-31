<!DOCTYPE html>
<html lang="en">
    <head>
    </head>
    <body>
        <div style="display: flex;">
            @php
                $factor = 1e6;
                $i = 0;
                $bladeNoParamsStart = hrtime(true);
            @endphp
            @while (++$i <= 200)
                <x-heroicon-o-arrow-right/>
            @endwhile
            @php
                $bladeNoParamsEnd = hrtime(true);
            @endphp
        </div>
        <div style="display: flex;">
            @php
                $i = 0;
                $bladeWithParamsStart = hrtime(true);
            @endphp
            @while (++$i <= 200)
                <x-heroicon-o-arrow-left class="w-6 h-6 text-gray-500"/>
            @endwhile
            @php
                $bladeWithParamsEnd = hrtime(true);
            @endphp
        </div>
        <div style="display: flex;">
            @php
                $i = 0;
                $svgNoParams = hrtime(true);
            @endphp
            @while (++$i <= 200)
                @svg('heroicon-o-arrow-up')
            @endwhile
            @php
                $svgNoParamsEnd = hrtime(true);
            @endphp
        </div>
        <div style="display: flex;">
            @php
                $i = 0;
                $svgWithParamsStart = hrtime(true);
            @endphp
            @while (++$i <= 200)
                @svg('heroicon-o-arrow-down', 'w-6 h-6 text-gray-500')
            @endwhile
            @php
                $svgWithParamsEnd = hrtime(true);
            @endphp
        </div>

        <table>
            <tr>
                <th>Method</th>
                <th>With Params?</th>
                <th>Time</th>
            </tr>
            <tr>
                <td>Blade Component</td>
                <td style="text-align: center">No</td>
                <td style="text-align: right;">{{ number_format((($bladeNoParamsEnd-$bladeNoParamsStart)/$factor), 3) }}ms</td>
            </tr>
            <tr>
                <td>Blade Component</td>
                <td style="text-align: center">Yes</td>
                <td style="text-align: right;">{{ number_format((($bladeWithParamsEnd-$bladeWithParamsStart)/$factor), 3) }}ms</td>
            </tr>
            <tr>
                <td>&#64;svg</td>
                <td style="text-align: center">No</td>
                <td style="text-align: right;">{{ number_format((($svgNoParamsEnd-$svgNoParams)/$factor), 3) }}ms</td>
            </tr>
            <tr>
                <td>&#64;svg</td>
                <td style="text-align: center">Yes</td>
                <td style="text-align: right;">{{ number_format((($svgWithParamsEnd-$svgWithParamsStart)/$factor), 3) }}ms</td>
            </tr>
        </table>
    </body>
</html>
