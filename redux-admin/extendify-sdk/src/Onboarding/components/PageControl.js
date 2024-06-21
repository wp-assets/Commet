import { __ } from '@wordpress/i18n'
import classNames from 'classnames'
import { updateOption } from '@onboarding/api/WPApi'
import { useGlobalStore } from '@onboarding/state/Global'
import { usePagesStore } from '@onboarding/state/Pages'
import { useUserSelectionStore } from '@onboarding/state/UserSelections'
import { LeftArrowIcon, RightArrowIcon } from '@onboarding/svg'

export const PageControl = () => {
    const { previousPage, currentPageIndex, pages } = usePagesStore()
    const onFirstPage = currentPageIndex === 0
    const currentPageKey = Array.from(pages.keys())[currentPageIndex]
    const exitLaunch = async (e) => {
        e.preventDefault()

        // Store when Launch is skipped.
        await updateOption(
            'extendify_onboarding_skipped',
            new Date().toISOString(),
        )

        location.href = window.extOnbData.adminUrl
    }

    return (
        <div className="flex items-center space-x-2">
            {onFirstPage && (
                <div className="fixed top-0 right-0 px-3 md:px-6 py-2">
                    <button
                        className="flex items-center p-1 text-partner-primary-bg font-medium button-focus md:focus:bg-transparent bg-transparent shadow-none"
                        type="button"
                        title={__('Exit Launch', 'extendify')}
                        onClick={exitLaunch}>
                        <span className="dashicons dashicons-no-alt text-white md:text-black"></span>
                    </button>
                </div>
            )}
            <div
                className={classNames('flex flex-1', {
                    'justify-end': currentPageKey === 'welcome',
                    'justify-between': currentPageKey !== 'welcome',
                })}>
                {onFirstPage || (
                    <button
                        className="flex items-center px-4 py-3 text-partner-primary-bg font-medium button-focus bg-gray-100 hover:bg-gray-200 focus:bg-gray-200 bg-transparent"
                        type="button"
                        onClick={previousPage}>
                        <RightArrowIcon className="h-5 w-5" />
                        {__('Back', 'extendify')}
                    </button>
                )}
                {onFirstPage && (
                    <button
                        className="flex items-center px-4 py-3 text-partner-primary-bg font-medium button-focus bg-gray-100 hover:bg-gray-200 focus:bg-gray-200 bg-transparent"
                        type="button"
                        onClick={exitLaunch}>
                        <RightArrowIcon className="h-5 w-5" />
                        {__('Exit Launch', 'extendify')}
                    </button>
                )}
                <NextButton />
            </div>
        </div>
    )
}

const NextButton = () => {
    const { nextPage, currentPageIndex, pages } = usePagesStore()
    const totalPages = usePagesStore((state) => state.count())
    const canLaunch = useUserSelectionStore((state) => state.canLaunch())
    const onLastPage = currentPageIndex === totalPages - 1
    const currentPageKey = Array.from(pages.keys())[currentPageIndex]
    const pageState = pages.get(currentPageKey).state()

    if (canLaunch && onLastPage) {
        return (
            <button
                className="px-4 py-3 font-bold bg-partner-primary-bg text-partner-primary-text button-focus"
                onClick={() => {
                    useGlobalStore.setState({ generating: true })
                }}
                type="button">
                {__('Launch site', 'extendify')}
            </button>
        )
    }

    return (
        <button
            className="flex items-center px-4 py-3 font-bold bg-partner-primary-bg text-partner-primary-text button-focus"
            onClick={nextPage}
            disabled={!pageState.ready}
            type="button">
            {__('Next', 'extendify')}
            <LeftArrowIcon className="h-5 w-5" />
        </button>
    )
}
