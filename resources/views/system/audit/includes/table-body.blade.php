<tr>
    <td>{{ $a }}</td>
    <td>{{ $datum->created_at->toDateTimeString().PHP_EOL }}</td>
    <td>{{ $datum->user_id.PHP_EOL != null ? \EkHelper::getUsernameForAudit($datum->user_id.PHP_EOL) : "N/A" }}</td>
    <td>{{ $datum->event.PHP_EOL }}</td>
    <td>{{ $datum->user_agent.PHP_EOL }}</td>
    <td>
        <ul>
            <li>
                User named {{ $datum->user_id.PHP_EOL != null ? \EkHelper::getUsernameForAudit($datum->user_id.PHP_EOL).', ' : "Anonymous"}}
                @if($datum->event.PHP_EOL == "Login Successful\n")

                    @lang('words.loggedin.metadata', $datum->getMetadata())
                @endif
                @if($datum->event.PHP_EOL == "Logout Successful\n")

                    @lang('words.loggedin.metadata', $datum->getMetadata())
                @endif
                @if($datum->event.PHP_EOL == "created\n")

                    @lang('words.created.metadata', $datum->getMetadata())
                @endif
                @if($datum->event.PHP_EOL == "updated\n")

                    @lang('words.updated.metadata', $datum->getMetadata())
                @endif
                @if($datum->event.PHP_EOL == "deleted\n")

                    @lang('words.deleted.metadata', $datum->getMetadata())
                @endif

                @foreach ($datum->getModified() as $attribute => $modified)
                    <ul>
                        <li>@lang('words.'.$datum->event.'.modified.'.$attribute, $modified)</li>
                    </ul>
                @endforeach
            </li>
        </ul>

    </td>
</tr>