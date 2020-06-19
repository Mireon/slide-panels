import StateEvents from '@tools/StateEvents';

/**
 * The stage events.
 */
export default class StageEvents extends StateEvents {
    /**
     * The constructor.
     *
     * @param element { Element }
     *   A DOM element.
     */
    public constructor(element: Element) {
        super(element, 'stage');
    }
}
